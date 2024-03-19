<?php
namespace App\GraphQL\Types;

use App\Grade;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\StringType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Schema;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GradeType extends GenericType
{
    protected $attributes = [
        'name' => 'Grade',
        'description' => 'A students grade',
        'model' => Grade::class,
    ];

    public function fields(): array
    {
        $return = parent::fields(); // TODO: Change the autogenerated stub


        // adding additional fields
        $add = [
            'user' => [
                'type' => GraphQL::type('User'),
                'description' => 'The individual who got this grade',

            ],
            'class' => [
                'type' => GraphQL::type('UniClass'),
                'description' => 'The class that this grade is for',

            ],
        ];

        $return = array_merge($return, $add);
        //$return= $add;

        //dd($return);

        return $return;
    }
}