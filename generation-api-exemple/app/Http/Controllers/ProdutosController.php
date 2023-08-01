<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    public function showProduct() {
        try {
            //$products = Produto::select('*')->where('name','=','edson')->get(); TESTE caso não tenha registro
            
            $products = Produto::select('*')->get();

            if(count($products) == 0) { // ASSINADO CRISTIANO REGO BARROS
                return new JsonResponse([
                    'message' => 'Nenhum  produto foi encontrado!',
                ], 404);
            }
            return new JsonResponse([
                'produtos' => $products
            ],200);
        } catch (\Throwable $th) {
            $th->getMessage();
        } 
    }
}