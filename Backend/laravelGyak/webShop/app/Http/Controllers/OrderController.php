<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function home(){
        // TODO::LOG info
        Log::info('Egy felhasználó megnyitotta a rendelési oldalt.');


        return view('orders.home');
    }
    public function preview(){
        $fakeOrder = [
            'order_number' => 'BOT-2025-001',
            'items' => [
                ['name' =>'USB-C kábel', 'qty' => 2, 'price' => 5900],
                ['name' =>'Wireless egér', 'qty' => 1, 'price' => 16999],
            ],
            'total' => 2*5990 + 16999,
            'customer' => 'Teszt Elek'
        ];
        Log::info('A kosár megtekintése!');
        Log::debug('kosár tartalom', $fakeOrder);
        return view('orders.preview', [
            'order' => $fakeOrder
        ]);
    }
    public function submit(Request $request)
    {
        //mode
        $mode = $request->query('mode', 'ok');
        /*
         * ok | stock | payment | slow | fraud
         */

        switch ($mode) {
            case 'stock':
                $title = 'Rendelés elutasítva - készlethiány';
                $message = 'Az egyik termék elfogyott a rendelést nem tudjuk teljesíteni';
                $details = [
                    'out_of_stock_item' => 'Wireless egér',
                ];
                break;
            case 'payment':
                $title = 'Rendelés elutasítva - fizetési hiba';
                $message = 'A banki fizetés nem sikerült. Probáld meg újra.';
                $details = [
                    'payment' => 'TesztBank',
                    'error_code' => 'PAY-500',
                ];
                  break;
            case 'slow':
                $title = 'Rendelés elutasítva - lassú fizetési szolgáltatás.';
                $message = 'A fizetési szolgáltató válasza lassú, a rendelés állapota függőben.';
                $details = [
                    'expected_response_es' => 500,
                    'actual_response_es' => 2600,
                ];
                break;
            case 'fraud':
                $title = 'Rendelés elutasítva - csalásgyanú';
                $message = 'A rendelést biztosnági okokból letíltottás, keresse ügyfélszolgáltatónkat.';
                $details = [
                    'reason' => 'Eltérő országú kártyával törtnt, több sikertelen probálkozás.',
                ];
                break;
            case 'ok':
                default:
                $title = 'Rendelés sikeresen rögzítve';
                $message = 'A rendelést fogadtuk, hamarosan visszaigazoló üzenetet küldünk.';
                $details = [
                    'order_number' => 'BOT-2025-001',
                    'estimated_delivery_days' => 3,
                ];
                break;
        }
        return view('orders.submit', [
            'title' => $title,
            'message' => $message,
            'details' => $details,
            'mode' => $mode,
        ]);
    }
    public function show($id){
        /*
         * ID< 1    Érvénytelen rendelés azonosító
         * ID 1-100 Rendelés megtekintése
         * ID > 100 Nem található rendleés
         */

        $status = '';
        $info = '';

        if ($id < 1){
            $status = 'Érvénytelen azonosító';
            $info = 'Az admin felület, csak pozitív azonosítókat fogad el.';
        } else if ($id > 100){
            $status = 'Nem található rendelés.';
            $info = 'Nincs ilyen azonosítójú rendelés a rendszerben.';
        } else{
            $status = 'Rendelés megtekítntése.';
            $info = 'Itt jelenne meg  a rendelés részletes adata.. De most csak a teszt..';
        }

        return view('admin.orders.show', [
            'status' => $status,
            'info' => $info,
            'id' => $id,
        ]);
    }
}
