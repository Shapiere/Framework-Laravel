<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Seed contoh transaksi.
     */
    public function run(): void
    {
        $customer = User::where('role', 'customer')->first();
        $book = Book::first();

        if (! $customer || ! $book) {
            return;
        }

        Transaction::create([
            'order_number' => 'ORD001',
            'customer_id' => $customer->id,
            'book_id' => $book->id,
            'total_amount' => $book->price,
        ]);
    }
}
