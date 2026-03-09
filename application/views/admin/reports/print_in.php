<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <style>
        body { color: #000; background-color: #fff; }
        @media print { 
            .btn-print { display: none; } 
            @page { margin: 1cm; }
        }
        .table-bordered th, .table-bordered td { border: 1px solid #000 !important; }
    </style>
</head>
<body onload="window.print()">
    <div class="container-fluid mt-4">
        <div class="text-center">
            <h2 class="font-weight-bold">LAPORAN BARANG MASUK</h2>
            <h5>Warehouse USK - <?= date('Y'); ?></h5>
            <hr style="border: 1px solid #000;">
        </div>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Supplier</th>
                    <th>Qty</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($ins as $i) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($i['datetime'])); ?></td>
                    <td><?= $i['product_name']; ?></td>
                    <td><?= $i['supplier_name']; ?></td>
                    <td><?= $i['qty']; ?></td>
                    <td><?= $i['user_name']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-5 float-right text-center" style="width: 200px;">
            <p>Dicetak pada: <?= date('d/m/Y H:i'); ?></p>
            <br><br><br>
            <p><b>( Admin Gudang )</b></p>
        </div>
    </div>
</body>
</html>