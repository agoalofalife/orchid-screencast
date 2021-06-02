<?php

namespace App\Orchid\Screens\Client;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Service;
use App\Orchid\Layouts\Client\ClientListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
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

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'clients' => Client::filters()->defaultSort('status', 'desc')->paginate(10)
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
            ModalToggle::make('Создать клиента')->modal('createClient')->method('create')
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
            ClientListTable::class,
            Layout::modal('createClient', Layout::rows([
                Input::make('phone')->required()->title('Телефон')->mask('(999) 999-9999'),
                Group::make([
                    Input::make('name')->required()->title('Имя'),
                    Input::make('last_name')->title('Фамилия'),
                ]),
                Input::make('email')->type('email')->title('Email'),
                DateTimer::make('birthday')->format('Y-m-d')->title('День рождения'),
                Relation::make('service_id')->fromModel(Service::class, 'name')->title('Тип услуги')->required()
            ]))->title('Создание клиента')->applyButton('Создать')
        ];
    }

    public function create(ClientRequest $request): void
    {
        Client::create(array_merge($request->validated(), [
            'status' => 'interviewed'
        ]));
        Toast::info('Клиент успешно создан');
    }
}
