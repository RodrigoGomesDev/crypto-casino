<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AccountTransaction;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{

    public function __construct(AccountTransaction $transaction)
    {
        //Desestruturando o model accountTransaction em uma váriavel
        $this->AccountTransaction = $transaction;
    }

    public function index() {
        //Requerindo todas transactions 
        $transaction = $this->AccountTransaction->all();

        //Mostrando em tela todos os transactions
        return response()->json($transaction);
    }
}