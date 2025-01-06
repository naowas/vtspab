@include('layouts.header')
<style>
    .section-title {
        padding: 2rem 0;
        text-align: center;
    }

    .section-title h2 {
        color: #009247;
        font-weight: 600;
        position: relative;
        padding-bottom: 15px;
    }

    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background-color: #212529;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        margin: 2rem 0;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #212529;
        color: white;
        border: none;
        padding: 1rem;
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }

    .serial-number {
        width: 70px;
        text-align: center;
    }

    .date-column {
        width: 180px;
    }

    .action-column {
        width: 120px;
        text-align: center;
    }

    .btn-read {
        background-color: #009247;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        white-space: nowrap; /* Prevent text wrapping */
    }

    .btn-read:hover {
        background-color: #007539;
        color: white;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .table {
            display: block;
            width: 100%;
            overflow-x: auto;
        }

        .date-column {
            width: 140px;
        }

        .section-title {
            padding: 1.5rem 0;
        }
    }
</style>

<main class="main py-4">
    <div class="container" style="margin-top: 100px">
        <div class="section-title">
            <p>Published Notices on BTRC Website</p>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="serial-number">SL</th>
                        <th>Title</th>
                        <th class="date-column">Last Updated on</th>
                        <th class="action-column">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notices as $key => $notice)
                        <tr>
                            <td class="serial-number">{{ $key + 1 }}</td>
                            <td>{{ $notice->title }}</td>
                            <td class="date-column">{{ $notice->published_at->format('F j, Y') }}</td>
                            <td class="action-column">
                                <a href="{{ $notice->url }}" class="btn-read" target="_blank">
                                    Read More
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@include('layouts.footer')
