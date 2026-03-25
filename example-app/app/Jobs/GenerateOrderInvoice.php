<?php

namespace App\Jobs;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class GenerateOrderInvoice implements ShouldQueue
{
    use Queueable;

    public $orderId;
    /**
     * Create a new job instance.
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $order = Order::find($this->orderId);
        $pdf = Pdf::loadView('invoices.order', ['order' => $order]);
        // Save or email the PDF
        Storage::put("invoices/order-{$this->orderId}.pdf", $pdf->output());
    }
}
