<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter{
    protected $safeParams = [
        'id' => ['eq', 'gt', 'lt'],
        'city' => ['eq'],
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'phone_number' => ['eq'],
    ];

    protected $columnMap = [
        'phoneNumber' => 'phone_number'
    ];

    protected $operatorMap = [
        'eq' => '=',       // Equal
        'neq' => '!=',     // Not equal
        'lt' => '<',       // Less than
        'lte' => '<=',     // Less than or equal to
        'gt' => '>',       // Greater than
        'gte' => '>=',     // Greater than or equal to
    ];


}
