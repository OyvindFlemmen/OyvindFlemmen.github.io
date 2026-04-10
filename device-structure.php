<?php 
$bg = "../images/device_structure.jpg";
include 'includes/header.php'; 
?>

<!-- Main content -->
<main class="col-lg-10 p-4 hero-section" style="--bg-image: url('<?php echo $bg; ?>')">
    <h1 class="page-title">Device structure</h1>
    <p>This section is split into four parts: the device's block diagram, the chosen components (and the reason for choosing them), the finished schematics, and the final layout of the PCB.
        Follow the links below to see each respective part. 
    </p>

    <div>
        <a href="/device-structure/block-diagram.php" class="btn btn-structure">Block Diagram</a>
        <a href="/device-structure/design-conclusions.php" class="btn btn-structure">Design Conclusions</a>
        <a href="/device-structure/schematic.php" class="btn btn-structure">Schematic</a>
        <a href="/device-structure/pcb-layout.php" class="btn btn-structure">PCB Layout</a>
    </div>
</main>

<?php include 'includes/footer.php'; ?>