<?php
$conn = new mysqli('localhost', 'root', '', 'mango');
if (!empty($_POST["keyword"])) {
    $sql = $conn->prepare("SELECT * FROM san_pham WHERE Ten_SP LIKE  ? ORDER BY Ten_SP LIMIT 0,3");
    $search = "%{$_POST['keyword']}%";
    $sql->bind_param("s", $search);
    $sql->execute();
    $result = $sql->get_result();
    if (!empty($result)) {
?>
        <ul id="country-list">
            <?php
            foreach ($result as $country) {
            ?>
                <li onClick="selectCountry('<?php echo $country["Ten_SP"]; ?>');">
                    <?php echo $country["Ten_SP"]; ?>
                </li>
            <?php
            } // end for
            ?>
        </ul>
<?php
    } // end if not empty
}
?>