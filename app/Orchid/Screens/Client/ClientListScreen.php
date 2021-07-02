<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Client;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Orchid\Filters\StatusFilter;
use App\Orchid\Layouts\Client\ClientListTable;
use App\Orchid\Layouts\CreateOrUpdateClient;
use App\Orchid\Layouts\OperatorSelection;
use App\View\Components\ProgressBoard;
use Carbon\Carbon;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Selection;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ClientListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Клиенты';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Список клиентов';

    public $permission = 'platform.clients';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $clients = Client::all();
        $interviewedClients = $clients->where('status', 'interviewed');

        $countYesterday = $interviewedClients->filter(function ($client) {
            return $client->updated_at->toDateString() === Carbon::yesterday()->toDateString();
        })->count();
        $countToday = $interviewedClients->filter(function ($client) {
            return $client->updated_at->toDateString() === Carbon::now()->toDateString();
        })->count();
        $progressDay = $countToday > 0 ? ($countToday - $countYesterday) / ($countYesterday > 0 ? $countYesterday : 1) * 100 : 0;

        return [
            'clients' => Client::filtersApplySelection(OperatorSelection::class)->filters()->defaultSort('status', 'desc')->paginate(10),
            'title'   => 'Результат выполненной работы',
            'percent' => $progressDay,
            'mainDigit' => $interviewedClients->count(),
            'quantityFromOneHundred' => ceil(100 * $interviewedClients->count() / $clients->count())
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Создать клиента')->modal('createClient')->method('createOrUpdateClient'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            OperatorSelection::class,
            Layout::component(ProgressBoard::class),
            ClientListTable::class,
            Layout::modal('createClient', CreateOrUpdateClient::class)->title('Создание клиента')->applyButton('Создать'),
            Layout::modal('editClient', CreateOrUpdateClient::class)->async('asyncGetClient')
        ];
    }

    public function asyncGetClient(Client $client): array
    {
        $client->load('invoice');
        return [
          'client' => $client
        ];
    }

    public function createOrUpdateClient(ClientRequest $request): void
    {
//        dd($request->all());
        $clientId = $request->input('client.id');
        Client::updateOrCreate([
            'id' => $clientId
        ], array_merge($request->validated()['client'], [
            'status' => 'interviewed',
            'invoice_id' => array_shift($request->validated()['client']['invoice_id'])
        ]));

        is_null($clientId) ? Toast::info('Клиент создан') : Toast::info('Клиент обновлен');
    }
}
