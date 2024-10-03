<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use App\Filters\ApiFilter;

class InvoiceFilter extends ApiFilter{


    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt', 'gt', 'gte', 'lte'],
        'status' => ['eq', 'neq'],
        'billedDate' => ['eq', 'lt', 'gt', 'gte', 'lte'],
        'paidDate' => ['eq', 'lt', 'gt', 'gte', 'lte'],
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
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
