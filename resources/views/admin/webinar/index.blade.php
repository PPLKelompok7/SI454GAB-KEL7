@extends('template.admin.index')
@section('content_admin')
@include('components.webinar-modal')

    <div class="pagetitle">
        <h1>Daftar Webinar</h1>
    </div>

    <section class="section">
        <div class="input-group my-4 gap-4">
            <input type="text" id="searchInput" class="form-control rounded" placeholder="Cari Webinar" />
            <button class="btn btn-success rounded" data-bs-toggle="modal" data-bs-target="#webinarModal"
                onclick="openCreateModal()">Tambah Webinar</button>
        </div>

        <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
            @foreach ($webinars as $webinar)
                <div class="col webinar-card" data-nama="{{ strtolower($webinar->nama) }}">
                    @include('components.webinar-card', ['webinar' => $webinar, 'konselor' => $konselor, 'isHome' => false])
                </div>
            @endforeach
        </div>

    </section>

    <script>
        const CARDS_PER_PAGE = 6;
        let CURRENT_PAGE = 1;
        let PAGE_BUTTONS = [];


        const cards = Array.from(document.querySelectorAll('.webinar-card'));
        const input = document.getElementById('searchInput');

        function showPage(page) {
            const start = (page - 1) * CARDS_PER_PAGE;
            const end = start + CARDS_PER_PAGE;

            cards.forEach((card, index) => {
                if (index >= start && index < end) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            CURRENT_PAGE = page;
        }

        function setupPagination() {
            const totalPages = Math.ceil(cards.length / CARDS_PER_PAGE);
            const paginationContainer = document.createElement('div');
            paginationContainer.className = 'pagination-container w-100 d-flex justify-content-center gap-2';

            PAGE_BUTTONS = []; // reset button list

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.className = 'btn btn-sm btn-outline-primary mx-1';

                pageButton.addEventListener('click', () => {
                    showPage(i);
                    setActiveButton(i);
                });

                paginationContainer.appendChild(pageButton);
                PAGE_BUTTONS.push(pageButton);
            }

            document.querySelector('.section').appendChild(paginationContainer);
            showPage(CURRENT_PAGE);
            setActiveButton(CURRENT_PAGE);
        }

        function setActiveButton(page) {
            PAGE_BUTTONS.forEach((button, index) => {
                if (index === page - 1) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        }

        input.addEventListener('input', function () {
            const query = this.value.toLowerCase();

            cards.forEach(card => {
                const nama = card.dataset.nama;
                if (nama.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        showPage(CURRENT_PAGE);
        setupPagination();
    </script>

@endsection