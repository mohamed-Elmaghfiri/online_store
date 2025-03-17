<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .table td {
            background-color: #f9f9f9;
        }
        .summary {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <h1>{{ $title }}</h1>

    <h2>Chiffre d'affaire et Bénéfice</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Chiffre d'affaire</th>
                <th>Bénéfice</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4"><strong>Today</strong></td>
            </tr>
            <tr>
                <td>Chiffre d'affaire Aujourd'hui</td>
                <td>{{ number_format($revenueToday, 2) }} $</td>
                <td>{{ number_format($profitToday, 2) }} $</td>
                <td>Today</td>
            </tr>
            <tr>
                <td>Chiffre d'affaire Ce Mois</td>
                <td>{{ number_format($revenueMonth, 2) }} $</td>
                <td>{{ number_format($profitMonth, 2) }} $</td>
                <td>Month</td>
            </tr>
            <tr>
                <td>Chiffre d'affaire Cette Année</td>
                <td>{{ number_format($revenueYear, 2) }} $</td>
                <td>{{ number_format($profitYear, 2) }} $</td>
                <td>Year</td>
            </tr>
            {{-- <tr>
                <td>Chiffre d'affaire Période 2024</td>
                <td>{{ number_format($revenuePeriod, 2) }} $</td> --}}
                {{-- <td>{{ number_format($profitPeriod, 2) }} $</td>
                <td>Period</td>
            </tr>
             --}}
            <tr>
                <td colspan="4"><strong>By Product</strong></td>
            </tr>
            @foreach($revenueByProduct as $product)
                <tr>
                    <td>{{ $product->produit }}</td>
                    <td>{{ number_format($product->revenue, 2) }} $</td>
                    <td>{{ number_format($product->profit, 2) }} $</td>
                    <td>Product</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4"><strong>By Category</strong></td>
            </tr>
            @foreach($revenueByCategory as $category)
                <tr>
                    <td>{{ $category->categorie }}</td>
                    <td>{{ number_format($category->revenue, 2) }} $</td>
                    <td>{{ number_format($category->profit, 2) }} $</td>
                    <td>Category</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4"><strong>By Country</strong></td>
            </tr>
            @foreach($revenueByCountry as $country)
                <tr>
                    <td>{{ $country->pays }}</td>
                    <td>{{ number_format($country->revenue, 2) }} $</td>
                    <td>{{ number_format($country->profit, 2) }} $</td>
                    <td>country</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <h3>Summary</h3>
        <p><strong>Total Revenue Today:</strong> ${{ number_format($revenueToday, 2) }}</p>
        <p><strong>Total Profit Today:</strong> ${{ number_format($profitToday, 2) }}</p>
        <p><strong>Total Revenue This Month:</strong> ${{ number_format($revenueMonth, 2) }}</p>
        <p><strong>Total Profit This Month:</strong> ${{ number_format($profitMonth, 2) }}</p>
        <p><strong>Total Revenue This Year:</strong> ${{ number_format($revenueYear, 2) }}</p>
        <p><strong>Total Profit This Year:</strong> ${{ number_format($profitYear, 2) }}</p>
        {{-- <p><strong>Total Revenue Period 2024:</strong> ${{ number_format($revenuePeriod, 2) }}</p> --}}
        {{-- <p><strong>Total Profit Period 2024:</strong> ${{ number_format($profitPeriod, 2) }}</p> --}}
    </div>

</body>
</html>
