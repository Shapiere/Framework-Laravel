<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['customer', 'book'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Get All Resource',
            'data' => $transactions,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $customer = $request->user();

        if (! $customer) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak valid, silakan login terlebih dahulu',
            ], 401);
        }

        $book = Book::find($request->book_id);

        if ($request->quantity > $book->stock) {
            return response()->json([
                'success' => false,
                'message' => 'Stok buku tidak mencukupi',
            ], 400);
        }

        $book->update(['stock' => $book->stock - $request->quantity]);

        $transaction = Transaction::create([
            'order_number' => $this->generateOrderNumber(),
            'customer_id' => $customer->id,
            'book_id' => $book->id,
            'total_amount' => $book->price * $request->quantity,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resource created successfully',
            'data' => $transaction,
        ], 201);
    }

    public function show(string $id)
    {
        $transaction = Transaction::with(['customer', 'book'])->find($id);

        if (! $transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Resource',
            'data' => $transaction,
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        if (! $transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $book = Book::find($request->book_id);

        $transaction->update([
            'book_id' => $book->id,
            'total_amount' => $book->price * $request->quantity,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $transaction,
        ], 200);
    }

    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        if (! $transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully',
        ], 200);
    }

    private function generateOrderNumber(): string
    {
        $sequence = Transaction::max('id') + 1;

        do {
            $orderNumber = 'ORD'.str_pad((string) $sequence, 3, '0', STR_PAD_LEFT);
            $sequence++;
        } while (Transaction::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }
}
