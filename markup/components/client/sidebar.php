<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/backend/Global_categories.php");
$Global_categories = new Global_categories();

include($_SERVER['DOCUMENT_ROOT'] . "/markup/status-menu.php");
$status = status_menu();
?>

<?php
if ($status === "open") {
    echo '<div class="my-menu">';
} else echo '<div class="my-menu" style="width: 4%">';
?>

<a style="height: 7%" href="/page/client/main"
   class="text-decoration-none d-flex px-4 col-12 align-items-center my-auto">

    <div class="d-flex">
        <svg class="d-block my-auto" width="28" height="14" viewBox="0 0 28 14" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M0.0996094 14V0.582031H13.6836V3.44336H3.82031V5.66016H13.1758V8.52148H3.82031V11.1387H13.8203V14H0.0996094Z"
                  fill="white"/>
            <path d="M0.0996094 14V0.582031H13.6836V3.44336H3.82031V5.66016H13.1758V8.52148H3.82031V11.1387H13.8203V14H0.0996094Z"
                  fill="#1877F2"/>
            <path d="M20.9766 7.11523L27.3438 14H22.998L18.7988 9.47852L14.6191 14H10.2832L16.6406 7.11523L10.5957 0.582031H14.9414L18.7988 4.78125L22.6758 0.582031H27.0215L20.9766 7.11523Z"
                  fill="white"/>
            <path d="M20.9766 7.11523L27.3438 14H22.998L18.7988 9.47852L14.6191 14H10.2832L16.6406 7.11523L10.5957 0.582031H14.9414L18.7988 4.78125L22.6758 0.582031H27.0215L20.9766 7.11523Z"
                  fill="#1877F2"/>
        </svg>
    </div>

    <?php
    if ($status === "open") {
        echo '<h5 class="d-flex text-white fw-bold mx-1 span_sidebar fs-5 my-auto"><svg width="76" height="14" viewBox="0 0 76 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.1602 14V4.57617L12.1797 14H8.70312L3.72266 4.57617V14H0.0996094V0.582031H5.02148L10.4414 10.7383L15.8613 0.582031H20.7637V14H17.1602ZM28.5859 14H24.9629V0.582031H34.0449C35.0215 0.582031 35.8483 0.682943 36.5254 0.884766C37.209 1.08659 37.7624 1.37305 38.1855 1.74414C38.6152 2.11523 38.9245 2.56445 39.1133 3.0918C39.3086 3.61263 39.4062 4.19531 39.4062 4.83984C39.4062 5.40625 39.3249 5.90104 39.1621 6.32422C39.0059 6.7474 38.791 7.11198 38.5176 7.41797C38.2507 7.71745 37.9382 7.97135 37.5801 8.17969C37.222 8.38802 36.8444 8.56055 36.4473 8.69727L40.8418 14H36.6035L32.541 9.05859H28.5859V14ZM35.7441 4.82031C35.7441 4.5599 35.7083 4.33854 35.6367 4.15625C35.5716 3.97396 35.4544 3.82747 35.2852 3.7168C35.1159 3.59961 34.888 3.51497 34.6016 3.46289C34.3216 3.41081 33.9701 3.38477 33.5469 3.38477H28.5859V6.25586H33.5469C33.9701 6.25586 34.3216 6.22982 34.6016 6.17773C34.888 6.12565 35.1159 6.04427 35.2852 5.93359C35.4544 5.81641 35.5716 5.66667 35.6367 5.48438C35.7083 5.30208 35.7441 5.08073 35.7441 4.82031ZM47.082 5.69922L54.5039 0.582031H59.3574L50.3242 7.01758L59.9629 14H54.6797L47.082 8.42383V14H43.4395V0.582031H47.082V5.69922ZM69.5918 3.50195V14H65.9688V3.50195H60.2754V0.582031H75.2949V3.50195H69.5918Z" fill="white"/>
</svg>
</h5>';
    } else echo '<h5 class="d-flex text-white fw-bold mx-1 span_sidebar d-none fs-5 my-auto"><svg width="76" height="14" viewBox="0 0 76 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.1602 14V4.57617L12.1797 14H8.70312L3.72266 4.57617V14H0.0996094V0.582031H5.02148L10.4414 10.7383L15.8613 0.582031H20.7637V14H17.1602ZM28.5859 14H24.9629V0.582031H34.0449C35.0215 0.582031 35.8483 0.682943 36.5254 0.884766C37.209 1.08659 37.7624 1.37305 38.1855 1.74414C38.6152 2.11523 38.9245 2.56445 39.1133 3.0918C39.3086 3.61263 39.4062 4.19531 39.4062 4.83984C39.4062 5.40625 39.3249 5.90104 39.1621 6.32422C39.0059 6.7474 38.791 7.11198 38.5176 7.41797C38.2507 7.71745 37.9382 7.97135 37.5801 8.17969C37.222 8.38802 36.8444 8.56055 36.4473 8.69727L40.8418 14H36.6035L32.541 9.05859H28.5859V14ZM35.7441 4.82031C35.7441 4.5599 35.7083 4.33854 35.6367 4.15625C35.5716 3.97396 35.4544 3.82747 35.2852 3.7168C35.1159 3.59961 34.888 3.51497 34.6016 3.46289C34.3216 3.41081 33.9701 3.38477 33.5469 3.38477H28.5859V6.25586H33.5469C33.9701 6.25586 34.3216 6.22982 34.6016 6.17773C34.888 6.12565 35.1159 6.04427 35.2852 5.93359C35.4544 5.81641 35.5716 5.66667 35.6367 5.48438C35.7083 5.30208 35.7441 5.08073 35.7441 4.82031ZM47.082 5.69922L54.5039 0.582031H59.3574L50.3242 7.01758L59.9629 14H54.6797L47.082 8.42383V14H43.4395V0.582031H47.082V5.69922ZM69.5918 3.50195V14H65.9688V3.50195H60.2754V0.582031H75.2949V3.50195H69.5918Z" fill="white"/>
</svg>
</h5>';
    ?>
</a>

<!------------------------------------------->
<!------------------------------------------->
<!-----------------Большое меню-------------------------->

<?php
if ($status === "open") {
    echo '<div class="col-12 big_sidebar">';
} else echo '<div class="col-12 big_sidebar d-none">';
?>
<a href="/page/client/main"
   class="mt-3 mx-4 rounded-1 text-decoration-none text-white menu_sidebar menu_sidebar_main d-flex bg-transparent text-14">

    <div class="px-2 py-1 rounded-1 menu_sidebar_active_uniq_mini">
        <svg class="my-auto" width="13" height="15" viewBox="0 0 15 17" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12.8801H10.5M1 6.80769V13.8097C1 14.4784 1.3342 15.1029 1.8906 15.4738L1.99615 15.5442C2.32469 15.7632 2.7107 15.8801 3.10555 15.8801H11.5279C11.8384 15.8801 12.1446 15.8078 12.4223 15.6689L12.8944 15.4329C13.572 15.0941 14 14.4016 14 13.644V6.80769C14 6.21939 13.741 5.66093 13.2919 5.28092L8.79188 1.47323C8.04619 0.842258 6.95381 0.842258 6.20812 1.47323L1.70812 5.28092C1.25901 5.66093 1 6.21939 1 6.80769Z"
                  stroke="#1C1C1C"/>
        </svg>
    </div>

    <span class="my-auto lh-1 mx-1">Главная</span>
</a>

<!--<a href="/page/client/main"-->
<!--   class="mt-1 mx-4 rounded-1 text-decoration-none text-white menu_sidebar menu_sidebar_analytics d-flex bg-transparent text-14">-->
<!---->
<!--    <div class="px-2 py-1 rounded-1 menu_mini_sidebar menu_sidebar_analytics_mini">-->
<!--        <svg class="my-auto" width="13" viewBox="0 0 15 13" fill="white" xmlns="http://www.w3.org/2000/svg">-->
<!--            <path d="M2.375 11.8182C1.82272 11.8182 1.375 11.3705 1.375 10.8182V0.590909C1.375 0.264559 1.12316 0 0.8125 0C0.50184 0 0.25 0.264559 0.25 0.590909V12.4091C0.25 12.7354 0.50184 13 0.8125 13H14.3125C14.6232 13 14.875 12.7354 14.875 12.4091C14.875 12.0827 14.6232 11.8182 14.3125 11.8182H2.375Z"/>-->
<!--            <path d="M0.414963 9.6274C0.309474 9.73821 0.25 9.88874 0.25 10.0455C0.25 10.0549 0.250217 10.0644 0.250649 10.0738C0.257367 10.2206 0.315871 10.3594 0.414752 10.4633C0.520242 10.5741 0.663316 10.6364 0.8125 10.6364C0.961684 10.6364 1.10476 10.5741 1.21025 10.4633L4.5882 6.91474C4.98232 6.50071 5.64268 6.50071 6.0368 6.91474L7.16475 8.09965C7.38442 8.33042 7.74058 8.33042 7.96025 8.09965L13.5852 2.19056C13.6907 2.07975 13.75 1.92945 13.75 1.77273C13.75 1.61601 13.6907 1.46571 13.5852 1.35489C13.4798 1.24407 13.3367 1.18182 13.1875 1.18182C13.0383 1.18182 12.8952 1.24407 12.7898 1.35489L8.2868 6.08526C7.89268 6.49929 7.23232 6.49929 6.8382 6.08526L5.71025 4.90035C5.60476 4.78953 5.46168 4.72727 5.3125 4.72727C5.16332 4.72727 5.02024 4.78953 4.91475 4.90035L0.414963 9.6274Z"/>-->
<!--            <path d="M13.1875 1.18182H10.375C10.0643 1.18182 9.8125 1.44638 9.8125 1.77273C9.8125 2.09908 10.0643 2.36364 10.375 2.36364H11.625C12.1773 2.36364 12.625 2.81135 12.625 3.36364V4.72727C12.625 5.05362 12.8768 5.31818 13.1875 5.31818C13.4982 5.31818 13.75 5.05362 13.75 4.72727V1.77273C13.75 1.44638 13.4982 1.18182 13.1875 1.18182Z"/>-->
<!--        </svg>-->
<!--    </div>-->
<!---->
<!--    <span class="my-auto lh-1 mx-1">Аналитика</span>-->
<!--</a>-->

<a href="/page/client/shop/shops"
   class="mt-1 mx-4 rounded-1 text-decoration-none text-white menu_sidebar menu_sidebar_shops d-flex bg-transparent text-14">

    <div class="px-2 py-1 rounded-1 menu_mini_sidebar menu_sidebar_shops_mini">
        <svg class="my-auto" width="15" viewBox="0 0 15 12" fill="" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M2.23885 12L12.8846 12L12.8872 12L12.8879 12C12.8879 12 13.2872 11.998 13.586 11.7565C13.586 11.7565 13.885 11.5147 13.9344 11.1533L14.8704 3.46693C14.8704 3.46693 14.8955 3.26502 14.8279 3.07025C14.8279 3.07025 14.7602 2.87549 14.6113 2.7227C14.6113 2.7227 14.4625 2.56992 14.2582 2.48559C14.2582 2.48559 14.0539 2.40127 13.8297 2.40001L1.2995 2.4C1.2995 2.4 1.07201 2.40127 0.867755 2.48559C0.867755 2.48559 0.6635 2.56992 0.514633 2.7227C0.514633 2.7227 0.365766 2.87549 0.298084 3.07025C0.298084 3.07025 0.230403 3.26502 0.255635 3.46801L1.19074 11.1469C1.19074 11.1469 1.24092 11.5147 1.53997 11.7565C1.53997 11.7565 1.83902 11.9983 2.23885 12ZM12.8841 11.0397C12.8849 11.0395 12.8857 11.0391 12.8865 11.0385C12.8865 11.0385 12.8884 11.037 12.8887 11.0347L13.8232 3.35999L1.30274 3.35999L2.23809 11.0409C2.23809 11.0409 2.23779 11.0384 2.23848 11.0381C2.23864 11.0382 2.23919 11.0383 2.23946 11.0385C2.23946 11.0385 2.24131 11.04 2.2438 11.04L12.8822 11.04C12.8822 11.04 12.8832 11.04 12.8841 11.0397Z"
                  fill-opacity="0.85"/>
            <path d="M9.67059 2.88V4.8C9.67059 5.0651 9.90649 5.28 10.1975 5.28C10.4885 5.28 10.7244 5.0651 10.7244 4.8V2.88C10.7244 1.68707 9.79843 0.843532 9.79843 0.843532C8.87249 0 7.563 0 7.563 0C6.25352 0 5.32757 0.843532 5.32757 0.843532C4.40162 1.68707 4.40162 2.88 4.40162 2.88V4.8C4.40162 5.0651 4.63752 5.28 4.92852 5.28C5.21952 5.28 5.45542 5.0651 5.45542 4.8V2.88C5.45542 2.08471 6.07271 1.52236 6.07271 1.52236C6.69001 0.96 7.563 0.96 7.563 0.96C8.43599 0.96 9.05329 1.52235 9.05329 1.52235C9.67059 2.08471 9.67059 2.88 9.67059 2.88Z"
                  fill-opacity="0.85"/>
        </svg>
    </div>

    <span class="my-auto lh-1 mx-1">Шопы</span>
</a>

<a href="/page/client/product/products"
   class="mt-1 mx-4 rounded-1 text-decoration-none text-white menu_sidebar menu_sidebar_product d-flex bg-transparent text-14">

    <div class="px-2 py-1 rounded-1 menu_mini_sidebar menu_sidebar_product_mini">
        <svg class="my-auto" width="15" viewBox="0 0 15 13" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.60156 0C3.60156 0 4.98983 0 5.97148 0.872578C5.97148 0.872578 6.95312 1.74516 6.95312 2.97917C6.95312 2.97917 6.95312 4.21318 5.97147 5.08576C5.97147 5.08576 4.98982 5.95833 3.60156 5.95833C3.60156 5.95833 2.2133 5.95833 1.23165 5.08576C1.23165 5.08576 0.25 4.21318 0.25 2.97917C0.25 2.97917 0.25 1.74516 1.23165 0.872578C1.23165 0.872578 2.2133 0 3.60156 0ZM3.60156 1.08333C3.60156 1.08333 2.71812 1.08333 2.09344 1.63861C2.09344 1.63861 1.46875 2.19389 1.46875 2.97917C1.46875 2.97917 1.46875 3.76445 2.09344 4.31972C2.09344 4.31972 2.71812 4.875 3.60156 4.875C3.60156 4.875 4.485 4.875 5.10969 4.31972C5.10969 4.31972 5.73438 3.76445 5.73438 2.97917C5.73438 2.97917 5.73438 2.19389 5.10969 1.63861C5.10969 1.63861 4.485 1.08333 3.60156 1.08333Z"
                  fill-opacity="0.85"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M11.5234 0C11.5234 0 12.9117 0 13.8934 0.872578C13.8934 0.872578 14.875 1.74516 14.875 2.97917C14.875 2.97917 14.875 4.21318 13.8934 5.08576C13.8934 5.08576 12.9117 5.95833 11.5234 5.95833C11.5234 5.95833 10.1352 5.95833 9.15353 5.08576C9.15353 5.08576 8.17188 4.21318 8.17188 2.97917C8.17188 2.97917 8.17188 1.74516 9.15353 0.872578C9.15353 0.872578 10.1352 0 11.5234 0ZM11.5234 1.08333C11.5234 1.08333 10.64 1.08333 10.0153 1.63861C10.0153 1.63861 9.39062 2.19389 9.39062 2.97917C9.39062 2.97917 9.39062 3.76445 10.0153 4.31972C10.0153 4.31972 10.64 4.875 11.5234 4.875C11.5234 4.875 12.4069 4.875 13.0316 4.31972C13.0316 4.31972 13.6562 3.76445 13.6562 2.97917C13.6562 2.97917 13.6563 2.19389 13.0316 1.63861C13.0316 1.63861 12.4069 1.08333 11.5234 1.08333Z"
                  fill-opacity="0.85"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.60156 7.04167C3.60156 7.04167 4.98983 7.04167 5.97148 7.91424C5.97148 7.91424 6.95312 8.78682 6.95312 10.0208C6.95312 10.0208 6.95312 11.2548 5.97147 12.1274C5.97147 12.1274 4.98982 13 3.60156 13C3.60156 13 2.2133 13 1.23165 12.1274C1.23165 12.1274 0.25 11.2548 0.25 10.0208C0.25 10.0208 0.25 8.78682 1.23165 7.91424C1.23165 7.91424 2.2133 7.04167 3.60156 7.04167ZM3.60156 8.125C3.60156 8.125 2.71812 8.125 2.09344 8.68028C2.09344 8.68028 1.46875 9.23555 1.46875 10.0208C1.46875 10.0208 1.46875 10.8061 2.09344 11.3614C2.09344 11.3614 2.71812 11.9167 3.60156 11.9167C3.60156 11.9167 4.485 11.9167 5.10969 11.3614C5.10969 11.3614 5.73438 10.8061 5.73438 10.0208C5.73438 10.0208 5.73438 9.23555 5.10969 8.68028C5.10969 8.68028 4.485 8.125 3.60156 8.125Z"
                  fill-opacity="0.85"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M11.5234 7.04167C11.5234 7.04167 12.9117 7.04167 13.8934 7.91424C13.8934 7.91424 14.875 8.78682 14.875 10.0208C14.875 10.0208 14.875 11.2548 13.8934 12.1274C13.8934 12.1274 12.9117 13 11.5234 13C11.5234 13 10.1352 13 9.15353 12.1274C9.15353 12.1274 8.17188 11.2548 8.17188 10.0208C8.17188 10.0208 8.17188 8.78682 9.15353 7.91424C9.15353 7.91424 10.1352 7.04167 11.5234 7.04167ZM11.5234 8.125C11.5234 8.125 10.64 8.125 10.0153 8.68028C10.0153 8.68028 9.39062 9.23555 9.39062 10.0208C9.39062 10.0208 9.39062 10.8061 10.0153 11.3614C10.0153 11.3614 10.64 11.9167 11.5234 11.9167C11.5234 11.9167 12.4069 11.9167 13.0316 11.3614C13.0316 11.3614 13.6562 10.8061 13.6562 10.0208C13.6562 10.0208 13.6563 9.23555 13.0316 8.68028C13.0316 8.68028 12.4069 8.125 11.5234 8.125Z"
                  fill-opacity="0.85"/>
        </svg>
    </div>

    <span class="my-auto lh-1 mx-1">Товары</span>
</a>
</div>

<!------------------------------------------->
<!------------------------------------------->
<!-----------------Скрытое меню-------------------------->

<?php
if ($status !== "open") {
    echo '<div class="col-12 mini_sidebar">';
} else echo '<div class="col-12 mini_sidebar d-none">';
?>
<a href="/page/client/main"
   class="mt-3 mx-4 rounded-1 text-decoration-none text-white menu_sidebar d-flex bg-transparent text-14">

    <div class="px-2 py-1 rounded-1 menu_sidebar_mini menu_sidebar_active_uniq_mini">
        <svg class="my-auto" width="13" height="15" viewBox="0 0 15 17" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12.8801H10.5M1 6.80769V13.8097C1 14.4784 1.3342 15.1029 1.8906 15.4738L1.99615 15.5442C2.32469 15.7632 2.7107 15.8801 3.10555 15.8801H11.5279C11.8384 15.8801 12.1446 15.8078 12.4223 15.6689L12.8944 15.4329C13.572 15.0941 14 14.4016 14 13.644V6.80769C14 6.21939 13.741 5.66093 13.2919 5.28092L8.79188 1.47323C8.04619 0.842258 6.95381 0.842258 6.20812 1.47323L1.70812 5.28092C1.25901 5.66093 1 6.21939 1 6.80769Z"
                  stroke="#1C1C1C"/>
        </svg>
    </div>
</a>

<!--<a href="/page/client/main"-->
<!--   class="mt-1 mx-4 rounded-1 text-decoration-none text-white menu_sidebar d-flex bg-transparent text-14">-->
<!---->
<!--    <div class="px-2 py-1 rounded-1 menu_sidebar_mini menu_sidebar_analytics_mini">-->
<!--        <svg class="my-auto" width="13" viewBox="0 0 15 13" fill="white" xmlns="http://www.w3.org/2000/svg">-->
<!--            <path d="M2.375 11.8182C1.82272 11.8182 1.375 11.3705 1.375 10.8182V0.590909C1.375 0.264559 1.12316 0 0.8125 0C0.50184 0 0.25 0.264559 0.25 0.590909V12.4091C0.25 12.7354 0.50184 13 0.8125 13H14.3125C14.6232 13 14.875 12.7354 14.875 12.4091C14.875 12.0827 14.6232 11.8182 14.3125 11.8182H2.375Z"/>-->
<!--            <path d="M0.414963 9.6274C0.309474 9.73821 0.25 9.88874 0.25 10.0455C0.25 10.0549 0.250217 10.0644 0.250649 10.0738C0.257367 10.2206 0.315871 10.3594 0.414752 10.4633C0.520242 10.5741 0.663316 10.6364 0.8125 10.6364C0.961684 10.6364 1.10476 10.5741 1.21025 10.4633L4.5882 6.91474C4.98232 6.50071 5.64268 6.50071 6.0368 6.91474L7.16475 8.09965C7.38442 8.33042 7.74058 8.33042 7.96025 8.09965L13.5852 2.19056C13.6907 2.07975 13.75 1.92945 13.75 1.77273C13.75 1.61601 13.6907 1.46571 13.5852 1.35489C13.4798 1.24407 13.3367 1.18182 13.1875 1.18182C13.0383 1.18182 12.8952 1.24407 12.7898 1.35489L8.2868 6.08526C7.89268 6.49929 7.23232 6.49929 6.8382 6.08526L5.71025 4.90035C5.60476 4.78953 5.46168 4.72727 5.3125 4.72727C5.16332 4.72727 5.02024 4.78953 4.91475 4.90035L0.414963 9.6274Z"/>-->
<!--            <path d="M13.1875 1.18182H10.375C10.0643 1.18182 9.8125 1.44638 9.8125 1.77273C9.8125 2.09908 10.0643 2.36364 10.375 2.36364H11.625C12.1773 2.36364 12.625 2.81135 12.625 3.36364V4.72727C12.625 5.05362 12.8768 5.31818 13.1875 5.31818C13.4982 5.31818 13.75 5.05362 13.75 4.72727V1.77273C13.75 1.44638 13.4982 1.18182 13.1875 1.18182Z"/>-->
<!--        </svg>-->
<!--    </div>-->
<!--</a>-->

<a href="/page/client/shop/shops"
   class="mt-1 mx-4 rounded-1 text-decoration-none text-white menu_sidebar d-flex bg-transparent text-14">

    <div class="px-2 py-1 rounded-1 menu_sidebar_mini menu_sidebar_shops_mini">
        <svg class="my-auto" width="15" viewBox="0 0 15 12" fill="" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M2.23885 12L12.8846 12L12.8872 12L12.8879 12C12.8879 12 13.2872 11.998 13.586 11.7565C13.586 11.7565 13.885 11.5147 13.9344 11.1533L14.8704 3.46693C14.8704 3.46693 14.8955 3.26502 14.8279 3.07025C14.8279 3.07025 14.7602 2.87549 14.6113 2.7227C14.6113 2.7227 14.4625 2.56992 14.2582 2.48559C14.2582 2.48559 14.0539 2.40127 13.8297 2.40001L1.2995 2.4C1.2995 2.4 1.07201 2.40127 0.867755 2.48559C0.867755 2.48559 0.6635 2.56992 0.514633 2.7227C0.514633 2.7227 0.365766 2.87549 0.298084 3.07025C0.298084 3.07025 0.230403 3.26502 0.255635 3.46801L1.19074 11.1469C1.19074 11.1469 1.24092 11.5147 1.53997 11.7565C1.53997 11.7565 1.83902 11.9983 2.23885 12ZM12.8841 11.0397C12.8849 11.0395 12.8857 11.0391 12.8865 11.0385C12.8865 11.0385 12.8884 11.037 12.8887 11.0347L13.8232 3.35999L1.30274 3.35999L2.23809 11.0409C2.23809 11.0409 2.23779 11.0384 2.23848 11.0381C2.23864 11.0382 2.23919 11.0383 2.23946 11.0385C2.23946 11.0385 2.24131 11.04 2.2438 11.04L12.8822 11.04C12.8822 11.04 12.8832 11.04 12.8841 11.0397Z"
                  fill-opacity="0.85"/>
            <path d="M9.67059 2.88V4.8C9.67059 5.0651 9.90649 5.28 10.1975 5.28C10.4885 5.28 10.7244 5.0651 10.7244 4.8V2.88C10.7244 1.68707 9.79843 0.843532 9.79843 0.843532C8.87249 0 7.563 0 7.563 0C6.25352 0 5.32757 0.843532 5.32757 0.843532C4.40162 1.68707 4.40162 2.88 4.40162 2.88V4.8C4.40162 5.0651 4.63752 5.28 4.92852 5.28C5.21952 5.28 5.45542 5.0651 5.45542 4.8V2.88C5.45542 2.08471 6.07271 1.52236 6.07271 1.52236C6.69001 0.96 7.563 0.96 7.563 0.96C8.43599 0.96 9.05329 1.52235 9.05329 1.52235C9.67059 2.08471 9.67059 2.88 9.67059 2.88Z"
                  fill-opacity="0.85"/>
        </svg>
    </div>
</a>

<a href="/page/client/product/products"
   class="mt-1 mx-4 rounded-1 text-decoration-none text-white menu_sidebar d-flex bg-transparent text-14">

    <div class="px-2 py-1 rounded-1 menu_sidebar_mini menu_sidebar_product_mini">
        <svg class="my-auto" width="15" viewBox="0 0 15 13" fill="" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.60156 0C3.60156 0 4.98983 0 5.97148 0.872578C5.97148 0.872578 6.95312 1.74516 6.95312 2.97917C6.95312 2.97917 6.95312 4.21318 5.97147 5.08576C5.97147 5.08576 4.98982 5.95833 3.60156 5.95833C3.60156 5.95833 2.2133 5.95833 1.23165 5.08576C1.23165 5.08576 0.25 4.21318 0.25 2.97917C0.25 2.97917 0.25 1.74516 1.23165 0.872578C1.23165 0.872578 2.2133 0 3.60156 0ZM3.60156 1.08333C3.60156 1.08333 2.71812 1.08333 2.09344 1.63861C2.09344 1.63861 1.46875 2.19389 1.46875 2.97917C1.46875 2.97917 1.46875 3.76445 2.09344 4.31972C2.09344 4.31972 2.71812 4.875 3.60156 4.875C3.60156 4.875 4.485 4.875 5.10969 4.31972C5.10969 4.31972 5.73438 3.76445 5.73438 2.97917C5.73438 2.97917 5.73438 2.19389 5.10969 1.63861C5.10969 1.63861 4.485 1.08333 3.60156 1.08333Z"
                  fill-opacity="0.85"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M11.5234 0C11.5234 0 12.9117 0 13.8934 0.872578C13.8934 0.872578 14.875 1.74516 14.875 2.97917C14.875 2.97917 14.875 4.21318 13.8934 5.08576C13.8934 5.08576 12.9117 5.95833 11.5234 5.95833C11.5234 5.95833 10.1352 5.95833 9.15353 5.08576C9.15353 5.08576 8.17188 4.21318 8.17188 2.97917C8.17188 2.97917 8.17188 1.74516 9.15353 0.872578C9.15353 0.872578 10.1352 0 11.5234 0ZM11.5234 1.08333C11.5234 1.08333 10.64 1.08333 10.0153 1.63861C10.0153 1.63861 9.39062 2.19389 9.39062 2.97917C9.39062 2.97917 9.39062 3.76445 10.0153 4.31972C10.0153 4.31972 10.64 4.875 11.5234 4.875C11.5234 4.875 12.4069 4.875 13.0316 4.31972C13.0316 4.31972 13.6562 3.76445 13.6562 2.97917C13.6562 2.97917 13.6563 2.19389 13.0316 1.63861C13.0316 1.63861 12.4069 1.08333 11.5234 1.08333Z"
                  fill-opacity="0.85"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.60156 7.04167C3.60156 7.04167 4.98983 7.04167 5.97148 7.91424C5.97148 7.91424 6.95312 8.78682 6.95312 10.0208C6.95312 10.0208 6.95312 11.2548 5.97147 12.1274C5.97147 12.1274 4.98982 13 3.60156 13C3.60156 13 2.2133 13 1.23165 12.1274C1.23165 12.1274 0.25 11.2548 0.25 10.0208C0.25 10.0208 0.25 8.78682 1.23165 7.91424C1.23165 7.91424 2.2133 7.04167 3.60156 7.04167ZM3.60156 8.125C3.60156 8.125 2.71812 8.125 2.09344 8.68028C2.09344 8.68028 1.46875 9.23555 1.46875 10.0208C1.46875 10.0208 1.46875 10.8061 2.09344 11.3614C2.09344 11.3614 2.71812 11.9167 3.60156 11.9167C3.60156 11.9167 4.485 11.9167 5.10969 11.3614C5.10969 11.3614 5.73438 10.8061 5.73438 10.0208C5.73438 10.0208 5.73438 9.23555 5.10969 8.68028C5.10969 8.68028 4.485 8.125 3.60156 8.125Z"
                  fill-opacity="0.85"/>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M11.5234 7.04167C11.5234 7.04167 12.9117 7.04167 13.8934 7.91424C13.8934 7.91424 14.875 8.78682 14.875 10.0208C14.875 10.0208 14.875 11.2548 13.8934 12.1274C13.8934 12.1274 12.9117 13 11.5234 13C11.5234 13 10.1352 13 9.15353 12.1274C9.15353 12.1274 8.17188 11.2548 8.17188 10.0208C8.17188 10.0208 8.17188 8.78682 9.15353 7.91424C9.15353 7.91424 10.1352 7.04167 11.5234 7.04167ZM11.5234 8.125C11.5234 8.125 10.64 8.125 10.0153 8.68028C10.0153 8.68028 9.39062 9.23555 9.39062 10.0208C9.39062 10.0208 9.39062 10.8061 10.0153 11.3614C10.0153 11.3614 10.64 11.9167 11.5234 11.9167C11.5234 11.9167 12.4069 11.9167 13.0316 11.3614C13.0316 11.3614 13.6562 10.8061 13.6562 10.0208C13.6562 10.0208 13.6563 9.23555 13.0316 8.68028C13.0316 8.68028 12.4069 8.125 11.5234 8.125Z"
                  fill-opacity="0.85"/>
        </svg>
    </div>
</a>
</div>


<br>
<?php
$directory = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
if ($status === "open" and $directory === "shops") {
    echo '<div class="col-12 scroll_none">';
} else echo '<div class="col-12 scroll_none d-none">';
?>
<div class="col-12">
    <h6 class="text-white text-center text-14 my-4">Типы аккаунтов</h6>

    <?php

    $array_Global_categories = $Global_categories->select_Global_categories();
    for ($i = 0; $i < count($array_Global_categories); $i++) {
        echo '<div id="'.$array_Global_categories[$i]['id'].'" class="col-8 mx-auto d-flex cursor menu_filter p-1 rounded-2 py-1 my-1">
        <img width="18" height="18" src="/res/img/img-category/' . $array_Global_categories[$i]['img'] . '">
        <h6 class="text-12 text-white my-auto mx-3">' . $array_Global_categories[$i]['name'] . '</h6>
    </div>';
    }

    ?>

    <button class="border_blue bg-transparent text-white rounded-3 col-8 d-block mx-auto text-14 mt-3 reset-filter">Сбросить фильтр</button>
</div>


</div>










<?php
$directory = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
if ($status === "open" and $directory === "shop") {
    echo '<div class="col-12 scroll_none filter_div_shop">';
} else echo '<div class="col-12 scroll_none d-none">';
?>
<div class="col-12">
        <h6 class="text-white text-center text-14 my-4 cursor col-10 d-flex justify-content-center mx-auto">Типы аккаунтов
<!--            <img class="mx-1 my-auto sidebar_filter_arrow" src="/res/st.svg" alt="">-->
        </h6>

        <div class="col-12 filter-shops-div-category">
            <?php

            $array_Global_categories = $Global_categories->select_Global_categories();
            for ($i = 0;
                 $i < count($array_Global_categories);
                 $i++) {

                if($i == 0) {
                    echo '<div id="'.$array_Global_categories[$i]['id'].'" class="col-8 mx-auto d-flex cursor menu_filter menu_filter_active p-1 rounded-2 py-1 my-1">
                <img width="18" height="18" src="/res/img/img-category/' . $array_Global_categories[$i]['img'] . '">
                <h6 class="text-12 text-white my-auto mx-3">' . $array_Global_categories[$i]['name'] . '</h6>
            </div>';

                }
                else {
                    echo '<div id="' . $array_Global_categories[$i]['id'] . '" class="col-8 mx-auto d-flex cursor menu_filter p-1 rounded-2 py-1 my-1">
        <img width="18" height="18" src="/res/img/img-category/' . $array_Global_categories[$i]['img'] . '">
        <h6 class="text-12 text-white my-auto mx-3">' . $array_Global_categories[$i]['name'] . '</h6>
            </div>';
                }
            }
            ?>
        </div>

    <div class="col-12 filter-shops-div-subcategories">

    </div>

    <div class="col-12">
        <div class="col-12 d-flex justify-content-center align-items-center my-4 cursor show_sidebar" data-status="0" data-img="img-price" data-div="filter-shops-div-price">
            <h6 class="text-white my-auto text-14 mx-1">Цена</h6>
            <img class="img-price" width="10" height="9" src="/res/img/arrow.png">
        </div>

        <div class="col-12 filter-shops-div-price transition d-none">
            <div id="slider-range" class="col-10 d-flex justify-content-between mx-auto text-12">
                <input class="col-5 text-center text-white sidebar_input_price border-0" type="number" id="min" min="1" style="background: linear-gradient(269.89deg, #151515 0.08%, #202020 99.91%); box-shadow: 0px 0px 4px 0.5px rgba(255, 249, 249, 0.1), inset 0px 4px 2px rgba(0, 0, 0, 0.25);
border-radius: 5px;">
                <input class="col-5 text-center text-white sidebar_input_price border-0" type="number" id="max" style="background: linear-gradient(269.89deg, #151515 0.08%, #202020 99.91%); box-shadow: 0px 0px 4px 0.5px rgba(255, 249, 249, 0.1), inset 0px 4px 2px rgba(0, 0, 0, 0.25);
border-radius: 5px;">
            </div>

            <div class="col-10 mx-auto my-3" id="slider"></div>
        </div>

    </div>



    <div class="col-12 filter-shops-div-select-parameters">

    </div>

    <div class="col-12">
        <h6 class="text-white text-center text-14 my-4 mt-5">Параметры</h6>

        <div class="col-12 filter-shops-div-parameters"></div>
    </div>

    <button class="border_blue bg-transparent text-white rounded-3 col-8 d-block mx-auto text-14 mt-3 reset-filter mt-5" onclick="ApplyFilter()">Применить</button>

    <button class="border_blue bg-transparent text-white rounded-3 col-8 d-block mx-auto text-14 mt-3 reset-filter">Сбросить фильтр</button>
</div>


</div>

</div>


<link rel="stylesheet" href="https://snipp.ru/cdn/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script src="https://snipp.ru/cdn/jqueryui/1.12.1/jquery-ui.min.js"></script>