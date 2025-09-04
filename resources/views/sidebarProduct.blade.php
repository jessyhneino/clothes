<nav class="sidebarProduct" id="filter-buttons">
    <style>
    .sidebarProduct ul { 
        display: flex; 
        flex-wrap: wrap; 
        gap: 10px; 
        padding: 0; 
        margin: 0; 
        list-style: none;
        align-items: center;
    }
    .sidebarProduct li { 
        display: inline-flex; 
    }
    .sidebarProduct button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #ffffff;
        color: #111827;
        cursor: pointer;
        white-space: nowrap;
    }
    .sidebarProduct button:hover { background: #f9fafb; }
    @media (max-width: 768px) {
        .sidebarProduct ul { flex-direction: column; align-items: stretch; }
        .sidebarProduct li { width: 100%; }
        .sidebarProduct button { width: 100%; justify-content: center; }
    }
    </style>
    <ul>
        <li><button onclick="filterProducts('all')" href="#"><i class="fa fa-home"></i>ALL</button ></li>
        <li><button onclick="filterProducts('summer')" href="#"><i class="fa fa-book"></i>SUMMER CLOTHING</button ></li>
        <li><button onclick="filterProducts('winter')" href="#"><i class="fa fa-book"></i>WINTER CLOTHING</button ></li>
    </ul>
</nav>