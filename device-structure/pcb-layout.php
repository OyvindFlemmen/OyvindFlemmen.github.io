<?php
$bg = "../images/device_structure.jpg";
include '../includes/header.php';
?>

<!-- Main content -->
<main class="col-lg-10 p-4 left-centered" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">PCB layout</h1>
    
    <p>
        I settled for a two-layer PCB, as the complexity is not that high. The board will be 75x75mm and features analogue and digital ground pours. Tented stitching vias are also used to import_request_variables
        the continuity of the ground planes across both layers of the PCB
    </p>
    <div class="row mb-5">
        
        <div class="col-md-6">
            <a href="/images/pcb_layout.png"><image class="large-image mb-4" src="/images/pcb_layout.png"></image></a>
        </div>

        <div class="col-md-6">
            <a href="/images/pcb_3d.png"><image class="large-image mb-4" src="/images/pcb_3d.png"></image></a>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>