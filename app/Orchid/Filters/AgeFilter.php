<?php

namespace App\Orchid\Filters;

use agoalofalife\Orchid\Fields\Range;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;

class AgeFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = ['age'];

    /**
     * @return string
     */
    public function name(): string
    {
        return 'Возраст';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        [$from, $to] = explode(';', $this->request->get('age'));

        return $builder->whereRaw("(year(now()) - year(birthday)) >= {$from}")
                ->whereRaw("(year(now()) - year(birthday)) <= {$to}");
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
          Range::make('age')
           ->title('Возраст')
           ->min(18)
           ->max(50)
           ->value($this->request->get('age'))
           ->hasGrid(true)
        ];
    }
}
