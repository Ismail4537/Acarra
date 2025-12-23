<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            padding: 30px;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #3B82F6;
            padding-bottom: 15px;
        }
        
        .header h1 {
            color: #3B82F6;
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .header p {
            color: #666;
            font-size: 12px;
        }
        
        .meta-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 12px;
            background-color: #F3F4F6;
            border-radius: 5px;
        }
        
        .meta-info div {
            font-size: 12px;
        }
        
        .meta-info strong {
            color: #3B82F6;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 11px;
        }
        
        thead {
            background-color: #3B82F6;
            color: white;
        }
        
        th {
            padding: 10px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        td {
            padding: 9px 10px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 10px;
        }
        
        tbody tr:hover {
            background-color: #F9FAFB;
        }
        
        tbody tr:nth-child(even) {
            background-color: #F3F4F6;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 9px;
            font-weight: 600;
            background-color: #DBEAFE;
            color: #1E40AF;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 9px;
            color: #999;
            border-top: 1px solid #E5E7EB;
            padding-top: 15px;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Comprehensive Report of All Event Categories</p>
    </div>
    
    <div class="meta-info">
        <div>
            <strong>Report Date:</strong> {{ $date }}
        </div>
        <div>
            <strong>Total Categories:</strong> {{ $total_categories }}
        </div>
    </div>
    
    @if($categories->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th style="width: 40%;">Category Name</th>
                    <th style="width: 25%;">Total Events</th>
                    <th style="width: 25%;">Created Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>
                        <span class="badge">{{ $category->events_count }} events</span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($category->created_at)->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            No categories found in the database.
        </div>
    @endif
    
    <div class="footer">
        <p>Generated on {{ now()->format('d F Y H:i:s') }} | Acarra Event Management System</p>
        <p>This is a computer-generated document. No signature is required.</p>
    </div>
</body>
</html>
