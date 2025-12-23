<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoryReportController extends Controller
{
    /**
     * Display reporting page with categories table
     */
    public function index()
    {
        $categories = Category::withCount('events')
            ->orderBy('name', 'asc')
            ->get();
        
        return view('reports.categories-index', [
            'title' => 'Category Reporting',
            'categories' => $categories
        ]);
    }
    
    /**
     * Generate PDF report of all categories
     */
    public function downloadPDF()
    {
        // Ambil semua data categories dari database
        $categories = Category::withCount('events')
            ->orderBy('name', 'asc')
            ->get();
        
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Category Report',
            'date' => date('d F Y'),
            'categories' => $categories,
            'total_categories' => $categories->count()
        ];
        
        // Load view dan generate PDF
        $pdf = Pdf::loadView('reports.categories-pdf', $data);
        
        // Set paper size dan orientation
        $pdf->setPaper('A4', 'portrait');
        
        // Download PDF dengan nama file dinamis
        return $pdf->download('categories-report-' . date('Y-m-d') . '.pdf');
    }
    
    /**
     * Preview PDF in browser
     */
    public function viewPDF()
    {
        // Ambil semua data categories dari database
        $categories = Category::withCount('events')
            ->orderBy('name', 'asc')
            ->get();
        
        // Data yang akan dikirim ke view PDF
        $data = [
            'title' => 'Category Report',
            'date' => date('d F Y'),
            'categories' => $categories,
            'total_categories' => $categories->count()
        ];
        
        // Load view dan generate PDF
        $pdf = Pdf::loadView('reports.categories-pdf', $data);
        
        // Set paper size dan orientation
        $pdf->setPaper('A4', 'portrait');
        
        // Stream PDF to browser (untuk preview)
        return $pdf->stream('categories-report-' . date('Y-m-d') . '.pdf');
    }
}
