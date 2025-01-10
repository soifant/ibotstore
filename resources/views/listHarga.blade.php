@extends('layouts.app')

@section('title', $pageName)

@section('content')
<div class="page-content"> 
    <div class="modal" id="dproduk" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Detail Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        HARGA SEWAKTU WAKTU DAPAT BERUBAH!
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody id="modal-table-body">
                                <!-- Data will be populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

        <div class="card border-primary mb-0">
            <div class="card-body">
                <section class="user-info px-24">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        @foreach($category as $cat)
                        <li class="nav-item" role="presentation">
                            <button onclick="btnCategory('{{ $cat->name }}')" class="nav-link {{ $cat->name == 'Games' ? 'active' : ''}}" id="tab-{{ $cat->id }}" data-bs-toggle="pill" data-bs-target="#tab{{ $cat->id }}" type="button" role="tab" aria-controls="tab{{ $cat->id }}" aria-selected="{{ $cat->name == 'Games' ? 'true' : 'false'}}">{{ $cat->name }}</button>
                        </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </div>
        <br>
        <div class="tab-content" id="pills-tabContent">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-sm-12 col-md-6">
                <div class="dataTables_length" id="DataTables_Table_0_length">
                    <label>
                        Show 
                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select" id="dataPerPageSelect">
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> 
                        entries
                    </label>
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                    <label>Search:
                        <input type="search" class="form-control input-sm" id="productSearch" placeholder="" aria-controls="DataTables_Table_0">
                    </label>
                </div>
            </div>

            <div class="mt-3 tab-pane fade show active" id="populer" role="tabpanel" aria-labelledby="populer-tab">
                <div class="table-responsive">
                    <table class="table table-bordered table-light tabel" id="DataTables_Table_0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Produk</th>
                                <th>Jml. Item</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="productTabelBody"></tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation example">
                  <ul id="pagination" class="pagination justify-content-center"></ul>
                </nav>

            </div>
            
        </div>
</div>
@endsection

@push('scripts')
<script>
    let data = {!! json_encode($category) !!};

    const dataPerPageSelect = document.getElementById('dataPerPageSelect');
    const productTableBody = document.getElementById('productTabelBody');

    let kategori = 'Games';
    let startIndex = 0;
    let page = 1;

    function showData(target,search = false) {

        productTableBody.innerHTML = '';

        const findData = data.find(obj => obj.name == target);
        const dataProduct = findData?.products ?? [];
        const totalData = dataProduct.length;
        const perPage = parseInt(dataPerPageSelect.value);
        const totalPages = totalData < perPage ? totalData : perPage;
        let indexData = totalPages * page;
        indexData = indexData > totalData ? totalData : (indexData < totalPages ? totalPages : indexData);
        startIndex = startIndex < 0 ? 0 : startIndex;

        for(let i = startIndex; i < indexData; i++) {
            const obj = dataProduct[i];
            const price = obj.prices.length > 0 ? JSON.parse(obj.prices[0].data) : [];
            const item = price.length;

            if(search && !obj.name.toLowerCase().includes(search)) continue;

            const row = `
    	    <tr>
    	        <td class="text-center">${i+1}.</td>
    	        <td>${obj.name}</td>
    	        <td>${item} item</td>
    	        <td><span class="badge ${obj.status ? 'bg-success">Aktif' : 'bg-danger">Non-Aktif' }</span></td>
    	        <td class="text-center">
    	            <button class="btn btn-sm btn-danger" onclick="openModal('${obj.name}','${target}')" title="Detail produk ${obj.name}" data-bs-toggle="modal" data-bs-target="#dproduk">
    	                <i class="bi bi-eye-fill"></i>
    	            </button>
                    
    	        </td>
    	    </tr>
    	    `;
            productTableBody.insertAdjacentHTML('beforeend', row);
        }

        const pagina = document.getElementById('pagination');
        pagina.innerHTML = '';
        const paginasiCount = Math.ceil(totalData / perPage);
        let paginationData = `<li class="page-item"><a class="page-link ${page <= 1 ? 'disabled' : ''}" onclick="pagination('previous')" >Previous</a></li>`;
        for(let i = 0; i < paginasiCount; i++) {
            paginationData += `<li class="page-item"><a class="page-link ${page == i+1 ? 'active' : ''}" href="#" onclick="pagination('${i+1}')">${i+1}</a></li>`;
        }
        paginationData += `<li class="page-item"><a class="page-link ${page >= paginasiCount ? 'disabled' : ''}" href="#" onclick="pagination('next')">Next</a></li>`;
        pagina.insertAdjacentHTML('beforeend', paginationData);
    }

    showData(kategori);
   
    function openModal(productName, category) {
        
        const findCategory = data.find(obj => obj.name == category);
        const findProduct = findCategory ? findCategory.products.find(obj => obj.name == productName) : null;
        const price = findProduct?.prices[0]?.data ? JSON.parse(findProduct.prices[0].data) : [];

        const modalTitle = document.getElementById('modal-title');
        const modalTableBody = document.getElementById('modal-table-body');


        modalTitle.textContent = `Detail Produk: ${productName}`;
        modalTableBody.innerHTML = "";

        price.forEach((detail,key) => {
            const row = `
                <tr>
                    <td>${key+1}</td>
                    <td>${detail.name}</td>
                    <td>${detail.price}</td>
                </tr>
            `;
            modalTableBody.insertAdjacentHTML('beforeend', row);
        });
    }

    const productSearch = document.getElementById('productSearch');
    productSearch.addEventListener('keyup', () => {
      const searchTerm = productSearch.value.toLowerCase();
      showData(kategori,searchTerm);
    });

    dataPerPageSelect.addEventListener('change', () => {
        showData(kategori);
    });

    function pagination(action) {
        const perPage = parseInt(dataPerPageSelect.value);
        console.log(perPage,page, startIndex);
        if(Number(action)) {
            const num = Number(action);
            if(page < num) {
                page = num;
                startIndex += perPage;
            }else{
                page = num;
                startIndex -= perPage;
            }
        } else {
            if(action == 'next') {
                page += 1;
                startIndex += perPage;
            }else{
                page -= 1;
                startIndex -= perPage;
            }
        }

        showData(kategori);
    }

    function btnCategory(name) {
        kategori = name;
        showData(kategori);
    }
</script>
@endpush