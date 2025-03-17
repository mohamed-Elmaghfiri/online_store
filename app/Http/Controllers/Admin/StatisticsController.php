<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // ------------------------------
        // 1. Chiffre d'affaires (Revenue)
        // ------------------------------

        // Total du chiffre d'affaires aujourd'hui, ce mois-ci et cette année
        $revenueToday   = Order::whereDate('created_at', Carbon::today())->sum('total');
        $revenueMonth   = Order::whereMonth('created_at', Carbon::now()->month)->sum('total');
        $revenueYear    = Order::whereYear('created_at', Carbon::now()->year)->sum('total');

        // Chiffre d'affaires sur une période personnalisée
        $startDate = Carbon::parse('2024-01-01'); // Modifier selon vos besoins
        $endDate   = Carbon::parse('2024-12-31');   // Modifier selon vos besoins
        // $revenuePeriod = Order::whereBetween('created_at', [$startDate, $endDate])->sum('total');

        // Chiffre d'affaires par produit
        $revenueByProduct = Item::join('products', 'items.product_id', '=', 'products.id')
            ->selectRaw('products.name as produit, SUM(items.quantity * items.price) as revenue')
            ->groupBy('products.name')
            ->get();

        // Chiffre d'affaires par catégorie
        $revenueByCategory = Item::join('products', 'items.product_id', '=', 'products.id')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->selectRaw('categories.name as categorie, SUM(items.quantity * items.price) as revenue')
            ->groupBy('categories.name')
            ->get();

        // Chiffre d'affaires par pays
        // (Suppose que la table 'users' possède une colonne 'country')
        $revenueByCountry = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->selectRaw('users.country as pays, SUM(orders.total) as revenue')
            ->groupBy('users.country')
            ->get();

        // ------------------------------
        // 2. Bénéfice (Profit)
        // ------------------------------
        // On considère que le bénéfice est de 5$ par produit vendu

        $profitToday   = Item::whereDate('created_at', Carbon::today())->sum('quantity') * 5;
        $profitMonth   = Item::whereMonth('created_at', Carbon::now()->month)->sum('quantity') * 5;
        $profitYear    = Item::whereYear('created_at', Carbon::now()->year)->sum('quantity') * 5;
        // $profitPeriod  = Item::whereBetween('created_at', [$startDate, $endDate])->sum('quantity') * 5;

        // Bénéfice par produit
        $profitByProduct = Item::join('products', 'items.product_id', '=', 'products.id')
            ->selectRaw('products.name as produit, SUM(items.quantity) * 5 as profit')
            ->groupBy('products.name')
            ->get();

        // Bénéfice par catégorie
        $profitByCategory = Item::join('products', 'items.product_id', '=', 'products.id')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->selectRaw('categories.name as categorie, SUM(items.quantity) * 5 as profit')
            ->groupBy('categories.name')
            ->get();

        // Bénéfice par pays
        $profitByCountry = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('items', 'orders.id', '=', 'items.order_id')
            ->selectRaw('users.country as pays, SUM(items.quantity) * 5 as profit')
            ->groupBy('users.country')
            ->get();

        // Regroupement des données pour la vue
        $viewData = [
            'title'             => 'Statistiques Utiles',
            // Chiffre d'affaires
            'revenueToday'      => $revenueToday,
            'revenueMonth'      => $revenueMonth,
            'revenueYear'       => $revenueYear,
            // 'revenuePeriod'     => $revenuePeriod,
            'revenueByProduct'  => $revenueByProduct,
            'revenueByCategory' => $revenueByCategory,
            'revenueByCountry'  => $revenueByCountry,
            // Bénéfice
            'profitToday'       => $profitToday,
            'profitMonth'       => $profitMonth,
            'profitYear'        => $profitYear,
            // 'profitPeriod'      => $profitPeriod,
            'profitByProduct'   => $profitByProduct,
            'profitByCategory'  => $profitByCategory,
            'profitByCountry'   => $profitByCountry,
        ];

        return view('admin.statistics.index')->with('viewData', $viewData);
    }

    /**
     * Exporte les statistiques en PDF.
     * Nécessite l'installation de barryvdh/laravel-dompdf.
     */
    public function exportPdf()
    {
        $data = $this->getAllStatistics();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.statistics.pdf', $data);
        return $pdf->download('admin.statistics.pdf');
    }

    /**
     * Rassemble toutes les statistiques dans un tableau.
     */
    private function getAllStatistics()
    {
        // Vous pouvez réutiliser ici le même code que dans la méthode index() ou le refactoriser
        return [
            'title'             => 'Statistiques Utiles',
            'revenueToday'      => Order::whereDate('created_at', Carbon::today())->sum('total'),
            'revenueMonth'      => Order::whereMonth('created_at', Carbon::now()->month)->sum('total'),
            'revenueYear'       => Order::whereYear('created_at', Carbon::now()->year)->sum('total'),
            // 'revenuePeriod'     => Order::whereBetween('created_at', [Carbon::parse('2024-01-01'), Carbon::parse('2024-12-31')])->sum('total'),
            "revenueByProduct" => Item::join('products', 'items.product_id', '=', 'products.id')
                ->selectRaw('products.name as produit, SUM(items.quantity * items.price) as revenue, SUM(items.quantity) * 5 as profit')
                ->groupBy('products.name')
                ->get(),

            "revenueByCategory" => Item::join('products', 'items.product_id', '=', 'products.id')
                ->join('categories', 'products.categorie_id', '=', 'categories.id')
                ->selectRaw('categories.name as categorie, SUM(items.quantity * items.price) as revenue, SUM(items.quantity) * 5 as profit')
                ->groupBy('categories.name')
                ->get(),

            "revenueByCountry" => Order::join('users', 'orders.user_id', '=', 'users.id')
                ->join('items', 'orders.id', '=', 'items.order_id')
                ->selectRaw('users.country as pays, SUM(items.quantity * items.price) as revenue, SUM(items.quantity) * 5 as profit')
                ->groupBy('users.country')
                ->get(),

            'profitToday'       => Item::whereDate('created_at', Carbon::today())->sum('quantity') * 5,
            'profitMonth'       => Item::whereMonth('created_at', Carbon::now()->month)->sum('quantity') * 5,
            'profitYear'        => Item::whereYear('created_at', Carbon::now()->year)->sum('quantity') * 5,
            // 'profitPeriod'      => Item::whereBetween('created_at', [Carbon::parse('2024-01-01'), Carbon::parse('2024-12-31')])->sum('quantity') * 5,
            'profitByProduct'   => Item::join('products', 'items.product_id', '=', 'products.id')
                ->selectRaw('products.name as produit, SUM(items.quantity) * 5 as profit')
                ->groupBy('products.name')
                ->get(),
            'profitByCategory'  => Item::join('products', 'items.product_id', '=', 'products.id')
                ->join('categories', 'products.categorie_id', '=', 'categories.id')
                ->selectRaw('categories.name as categorie, SUM(items.quantity) * 5 as profit')
                ->groupBy('categories.name')
                ->get(),
            'profitByCountry'   => Order::join('users', 'orders.user_id', '=', 'users.id')
                ->join('items', 'orders.id', '=', 'items.order_id')
                ->selectRaw('users.country as pays, SUM(items.quantity) * 5 as profit')
                ->groupBy('users.country')
                ->get(),
        ];
    }
}
