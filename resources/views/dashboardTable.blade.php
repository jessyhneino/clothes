@extends('layouts.master')

@section('title')
    DASHBOARD TABLE
@endsection

@section('content') 

<div class="sid">
    
    @include('sidebar')

    <!-- Header Section -->
    <!-- <div class="dashboard-header" style="
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 30px;
        border-radius: 15px;
        margin: 20px 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        color: white;
        text-align: center;
    ">
        <h1 style="
            margin: 0 0 15px 0;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        ">Product Management Dashboard</h1>
        <p style="
            margin: 0 0 25px 0;
            font-size: 1.1rem;
            opacity: 0.9;
        ">Manage your product inventory efficiently</p>
        
        <a class="create-btn" href="/create" role="button" style="
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
            border: none;
            cursor: pointer;
        " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(40, 167, 69, 0.4)'" 
           onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(40, 167, 69, 0.3)'">
            <i class="fas fa-plus-circle" style="font-size: 1.2rem;"></i>
            Create New Product
        </a>
    </div> -->

    <!-- Stats Cards -->
    <div class="dashboard-header" style="
         box-shadow: 0 10px 30px rgba(0,0,0,0.1);
         color: white;
         text-align: center;
         width: 100% !important;
     ">
        <!-- زر Create في الأعلى -->
        <div style="
            padding: 20px 0;
            margin-bottom: 20px;
        ">
            <a class="create-btn" href="/create" role="button" style="
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 15px 30px;
                background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
                color: white;
                text-decoration: none;
                border-radius: 50px;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
                border: none;
                cursor: pointer;
            " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(40, 167, 69, 0.4)'" 
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(40, 167, 69, 0.3)'">
                <i class="fas fa-plus-circle" style="font-size: 1.2rem;"></i>
                Create New Product
            </a>
        </div>
        
        <div class="stats-container" style="
            display: flex;
            flex-direction: row;
            gap: 20px;
            margin: 30px 0;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
        ">
        <div class="stat-card" style="
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
            border-left: 4px solid #28a745;
            width: 100% !important;
        ">
            <div style="font-size: 2rem; color: #28a745; margin-bottom: 8px;">
                <i class="fas fa-box"></i>
            </div>
            <h3 style="margin: 0; color: #333; font-size: 1.3rem;">{{ count($products) }}</h3>
            <p style="margin: 3px 0 0 0; color: #666; font-size: 0.9rem;">Total Products</p>
        </div>
        
        <div class="stat-card" style="
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
            border-left: 4px solid #ffc107;
            width: 100% !important;
        ">
            <div style="font-size: 2rem; color: #ffc107; margin-bottom: 8px;">
                <i class="fas fa-sun"></i>
            </div>
            <h3 style="margin: 0; color: #333; font-size: 1.3rem;">{{ $products->where('season', 'summer')->count() }}</h3>
            <p style="margin: 3px 0 0 0; color: #666; font-size: 0.9rem;">Summer Items</p>
        </div>
        
        <div class="stat-card" style="
            background: white;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
            border-left: 4px solid #667eea;
            width: 100% !important;
        ">
            <div style="font-size: 2rem; color: #667eea; margin-bottom: 8px;">
                <i class="fas fa-snowflake"></i>
            </div>
            <h3 style="margin: 0; color: #333; font-size: 1.3rem;">{{ $products->where('season', 'winter')->count() }}</h3>
            <p style="margin: 3px 0 0 0; color: #666; font-size: 0.9rem;">Winter Items</p>
        </div>
    </div>

    <!-- Table Container -->
    <div class="table-container" style="
        background: white;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        overflow: hidden;
        margin: 30px 0;
    ">
        <div class="table-header" style="
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px 30px;
            border-bottom: 1px solid #dee2e6;
        ">
            <h2 style="margin: 0; color: #495057; font-size: 1.5rem; font-weight: 600;">
                <i class="fas fa-table" style="margin-right: 10px; color: #667eea;"></i>
                Product List
            </h2>
        </div>
        
        <form class="tabledash" method="POST" action="{{route('insert')}}">
            @csrf
            <div style="overflow-x: auto;">
                <table style="
                    width: 100%;
                    border-collapse: collapse;
                    background: white;
                ">
                    <thead>
                        <tr style="
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            color: white;
                        ">
                            <th style="
                                padding: 18px 15px;
                                text-align: left;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">ID</th>
                            <th style="
                                padding: 18px 15px;
                                text-align: left;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">Product Name</th>
                            <th style="
                                padding: 18px 15px;
                                text-align: left;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">Price</th>
                            <th style="
                                padding: 18px 15px;
                                text-align: left;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">Image</th>
                            <th style="
                                padding: 18px 15px;
                                text-align: left;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">Season</th>
                            <th style="
                                padding: 18px 15px;
                                text-align: left;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">Description</th>
                            <th style="
                                padding: 18px 15px;
                                text-align: center;
                                font-weight: 600;
                                font-size: 0.95rem;
                                border: none;
                            ">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr style="
                            border-bottom: 1px solid #f1f3f4;
                            transition: all 0.2s ease;
                        " onmouseover="this.style.backgroundColor='#f8f9fa'" 
                           onmouseout="this.style.backgroundColor='white'">
                            <td style="
                                padding: 18px 15px;
                                font-weight: 600;
                                color:rgb(0, 0, 0);
                                font-size: 0.9rem;
                            ">#{{$product->id}}</td>
                            <td style="
                                padding: 18px 15px;
                                font-weight: 500;
                                color: #333;
                                font-size: 0.95rem;
                            ">{{$product->name_product}}</td>
                            <td style="
                                padding: 18px 15px;
                                font-weight: 600;
                                color: #28a745;
                                font-size: 1rem;
                            ">${{number_format($product->price, 2)}}</td>
                            <td style="padding: 18px 15px;">
                                <div class="table-img" style="
                                    width: 60px;
                                    height: 60px;
                                    border-radius: 8px;
                                    overflow: hidden;
                                    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                                ">
                                    <img src="{{asset($product->image)}}" alt="صورة المنتج" style="
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                    ">
                                </div>
                            </td>
                            <td style="padding: 18px 15px;">
                                <span class="season-badge" style="
                                    padding: 6px 12px;
                                    border-radius: 20px;
                                    font-size: 0.8rem;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                    {{ $product->season === 'summer' ? 'background:rgb(254, 239, 188); color: #856404;' : 'background:rgb(190, 229, 235); color: #0c5460;' }}
                                ">{{$product->season}}</span>
                            </td>
                            <td style="
                                padding: 18px 15px;
                                color: #666;
                                font-size: 0.9rem;
                                max-width: 200px;
                            ">{{ Str::limit($product->description, 50) }}</td>
                            <td style="
                                padding: 18px 15px;
                                text-align: center;
                            ">
                                <div class="action-buttons" style="
                                    display: flex;
                                    gap: 8px;
                                    justify-content: center;
                                ">
                                    <a class="b-edit" href="{{route('edit', ['id' => $product->id])}}" style="
                                        padding: 8px 16px;
                                        background: linear-gradient(135deg,rgb(23, 85, 184) 0%,rgb(42, 157, 223) 100%);
                                        color: white;
                                        text-decoration: none;
                                        border-radius: 6px;
                                        font-size: 0.85rem;
                                        font-weight: 500;
                                        transition: all 0.3s ease;
                                        box-shadow: 0 2px 8px rgba(23, 162, 184, 0.3);
                                    " onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgb(42, 157, 223)'" 
                                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgb(42, 157, 223)'">
                                        <i class="fas fa-edit" style="margin-right: 5px;"></i>Edit
                                    </a>
                                    <a class="b-delete" href="{{route('delete', ['id' => $product->id])}}" style="
                                        padding: 8px 16px;
                                        background: linear-gradient(135deg,rgb(246, 0, 25) 0%,rgb(248, 77, 94) 100%);
                                        color: white;
                                        text-decoration: none;
                                        border-radius: 6px;
                                        font-size: 0.85rem;
                                        font-weight: 500;
                                        transition: all 0.3s ease;
                                        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
                                    " onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgb(248, 77, 94)'" 
                                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgb(248, 77, 94)'">
                                        <i class="fas fa-trash" style="margin-right: 5px;"></i>Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection