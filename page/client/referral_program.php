<?php include($_SERVER['DOCUMENT_ROOT'] . "/print.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/backend/ReferralProgram.php"); ?>

<?php $ReferralProgram = new ReferralProgram(); ?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Возврат товара</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/link/client/link.php"); ?>
</head>
<body>

<!--Скрытый input активного меню-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_main" data-mini="menu_sidebar_active_uniq_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_analytics" data-mini="menu_sidebar_analytics_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_shops" data-mini="menu_sidebar_shops_mini">-->

<!--<input type="hidden" class="active_menu" data-type="sidebar" value="menu_sidebar_product"-->
<!--       data-mini="menu_sidebar_product_mini">-->


<!--Скрытый input Шапки меню-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-orders">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-balance">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-favorites">-->
<!--<input type="hidden" class="active_menu" data-type="header" value="a-header-return_product">-->
<input type="hidden" class="active_menu" data-type="header" value="a-header-referral_program">


<div class="col-12 d-flex h-100">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/sidebar.php"); ?>

    <div class="my-content">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/markup/components/client/header.php"); ?>

        <div class="col-12 content-body">
            <div class="myContainer mx-auto my-2">

                <div class="col-12 my-4 shadow_status d-flex justify-content-between">

                    <div class="w-62 bg-silver p-4 px-2 rounded-4 ">
                        <div class="col-9 border border-0 border-bottom border-secondary d-flex justify-content-between border-opacity-50 pb-3">
                            <div class="col-3 px-3 border border-secondary border-0 border-end border-opacity-50">
                                <h6 class="text-14">Баланс</h6>
                                <h6 class="mt-3 fs-5"><?php echo $ReferralProgram->ReturnReferralBalance(); ?> ₽</h6>
                            </div>

                            <div class="col-4 px-3 border border-secondary border-0 border-end border-opacity-50">
                                <h6 class="text-14">Всего пришло</h6>
                                <h6 class="mt-3 fs-5">190,000р.</h6>
                            </div>


                            <div class="col-5 px-3 border-opacity-50">
                                <h6 class="text-14">Кол-во рефералов</h6>
                                <h6 class="mt-3 fs-5"><?php print_r($ReferralProgram->NumberOfReferrals()); ?></h6>
                            </div>
                        </div>

                        <h6 class="text-14 mx-3 my-4">Ваша реферальная ссылка</h6>

                        <div class="col-9 mx-3 input-price-seller text-white border_input">
                            <input id="input-field" type="text"
                                   class="col-10 bg-transparent border-0 text-white px-4 input-referral-link" readonly
                                   value="<?php echo $ReferralProgram->ReturnReferralLink(); ?>">

                            <svg data-clipboard-target="#input-field" class="mx-4 cursor copy-referral-link" width="19"
                                 height="18" viewBox="0 0 19 18" fill="white" xmlns="http://www.w3.org/2000/svg"
                                 fill-opacity="0.4">
                                <path d="M15.6997 2.16626H5.718C5.41174 2.16626 5.16346 2.40873 5.16346 2.70783C5.16346 3.00692 5.41174 3.24939 5.718 3.24939H15.1451V12.456C15.1451 12.7551 15.3934 12.9976 15.6997 12.9976C16.0059 12.9976 16.2542 12.7551 16.2542 12.456V2.70783C16.2542 2.40873 16.0059 2.16626 15.6997 2.16626Z"
                                      fill="white" fill-opacity="0.4"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M2.94531 14.6223V4.87409C2.94531 4.57499 3.19359 4.33252 3.49985 4.33252H13.4815C13.7878 4.33252 14.0361 4.57499 14.0361 4.87409V14.6223C14.0361 14.9214 13.7878 15.1638 13.4815 15.1638H3.49985C3.19359 15.1638 2.94531 14.9214 2.94531 14.6223ZM12.927 14.0807H4.05439V5.41565H12.927V14.0807Z"
                                      fill-opacity="0.4" fill="white"/>
                            </svg>
                        </div>
                    </div>

                    <div class="w-35 bg-silver p-4 rounded-4">
                        <h6 class="">Правила реферальной программы.</h6>

                        <h6 class="text-14 my-4">Все пользователи зарегистрировавшиеся по вашей реферальной ссылке,
                            автоматически будут учитываться в вашем кабинете
                            <br><br>
                            Процент реф отчислений - 5%</h6>
                    </div>

                </div>

                <div class="col-12 d-flex justify-content-between mt-4">
                    <div class="w-48 bg-silver rounded-4 px-3 shadow_status position-relative">
                        <h6 class="my-1 text-14 text-white border-bottom border-secondary py-3">Платежные данные</h6>

                        <div class="d-flex my-4 align-items-center div_value">

                            <?php
                            if (!$ReferralProgram->ReturnReferralPayment_Details()) {
                                echo '<input type="text" class="input-price-seller mx-3 col-9 border-0 px-2 text-white input_payment">';
                                echo '<button class="btn bg-transparent border_blue btn_buy my-4 px-4 text-14 lh-1 text-white position-absolute bottom-0" onclick="btn_save()">Сохранить</button>';
                            } else {
                                $value = $ReferralProgram->ReturnReferralPayment_Details();
                                echo "<h6 class='h6_value'>" . $value['value'] . "</h6>";
                                echo '
                        <button class="btn bg-transparent border_blue btn_buy my-4 px-4 text-14 lh-1 text-white position-absolute bottom-0" onclick="update_value()">Изменить</button>';
                            }
                            ?>
                            <!--                            <h6 class="text-white my-auto text-14">USDT</h6>-->
                            <!---->
                            <!--                            <h6 class="text-white mx-3 my-auto h6_payment ">666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb</h6>-->
                        </div>

                    </div>

                    <div class="w-48 bg-silver rounded-4 px-3 shadow_status position-relative"
                         style="min-height: 220px">

                        <h6 class="my-1 text-14 text-white border-bottom border-secondary py-3 border-opacity-50">
                            Оформить заявку на вывод средств</h6>

                        <div class="d-flex my-2 mt-4">
                            <h6 class="text-white col-4 text-14">Доступная сумма - </h6>
                            <h6 class="text-white text-14"> <?php echo $ReferralProgram->ReturnReferralBalance(); ?></h6>
                        </div>

                        <?php
                        if (!$ReferralProgram->ReturnReferralPayment_Details()) {
                            ?>
                            <h6 class="text-white col-4 text-14">Сначада введите платежные данные!</h6>
                            <?php
                        } else {
                            ?>
                            <div class="d-flex my-2">
                                <h6 class="text-white col-4 text-14">Впишите сумму</h6>
                                <input type="number"
                                       class="text-white col-4 input-price-seller px-3 tex-14 w-25 border_input">
                            </div>


                            <button class="btn bg-transparent border_blue btn_buy my-4 px-4 text-14 lh-1 text-white position-absolute bottom-0">
                                Оформить
                            </button>
                            <?php
                        }
                        ?>


                    </div>
                </div>

                <div class="col-12 bg-silver rounded-4 m-auto my-4 p-4 shadow_status">

                    <div class="col-12 d-flex justify-content-between">
                        <div class="col-12 text-white d-flex align-items-center">
                            <span class="text-secondary text-14 span_coming cursor">Приход</span>
                            <span class="text-secondary text-14 mx-4">|</span>
                            <span class="text-white text-14 span_orders cursor">Ордера на вывод средств</span>


                            <span class="text-secondary text-14 mx-4">|</span>

                            <span class="text-14 mx-4">Даты</span>

                            <input value="2023-01-01" type="date"
                                   class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input"
                                   style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">

                            <input value="2023-01-01" type="date"
                                   class="text-14 text-white mx-3 input-price-seller px-2 py-1 rounded-2 border_input"
                                   style="background-color: rgba(255, 255, 255, 0.1) !important; min-height: 28px; !important;">
                        </div>

                        <div class="dropdown">

                        </div>
                    </div>

                    <table class="col-12 my-3 table_orders">
                        <tr class="border-bottom border-secondary text-secondary text-12">
                            <td class="col-2 lh-lg">Дата</td>
                            <td class="col-6">Платежные данные</td>
                            <td class="col-2">Сумма</td>
                            <td class="col-2">Исполнение</td>
                        </tr>

                        <tr class="text-white Regular" style="font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg ">12.12.2022</td>
                            <td class="col-6">USDT 666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb</td>
                            <td class="col-2">$123 930</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #95A4FC;">

                                    </div>

                                    <span class="text-12 mx-2" style="color: #95A4FC;">In Progress</span>
                                </div>
                            </td>

                        </tr>

                        <tr class="text-white Regular" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-6">USDT 666vh654gcjtrhhc64cfhkjghjhvf65fhgvyt677877thjb</td>
                            <td class="col-2">$123 930</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle" style="width: 6px; height: 6px; background: #A1E3CB;">

                                    </div>

                                    <span class="text-12 mx-2" style="color: #A1E3CB;">Competed</span>
                                </div>
                            </td>

                        </tr>
                    </table>

                    <table class="col-12 my-3 d-none table_coming">
                        <tr class="border-bottom border-secondary text-secondary text-12">
                            <td class="col-2 lh-lg">Дата</td>
                            <td class="col-3">Сумма покупки</td>
                            <td class="col-3">Процент отчислений</td>
                            <td class="col-2">Приход</td>
                            <td class="col-2">Исполнение</td>
                        </tr>

                        <tr class="text-white" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-3">100 р.</td>
                            <td class="col-3">5%</td>
                            <td class="col-2">5р.</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle"
                                         style="width: 6px; height: 6px; background: #A1E3CB;"></div>
                                    <span class="text-12 mx-2" style="color: #A1E3CB;">Competed</span>
                                </div>
                            </td>

                        </tr>

                        <tr class="text-white" style="font-weight: 400; font-size: 14px; line-height: 20px;">
                            <td class="col-2 lh-lg">12.12.2022</td>
                            <td class="col-3">100 р.</td>
                            <td class="col-3">5%</td>
                            <td class="col-2">5р.</td>
                            <td class="col-2">
                                <div class="col-12 mx-auto d-flex justify-content-start align-items-center py-3">
                                    <div class="rounded-circle"
                                         style="width: 6px; height: 6px; background: #95A4FC;"></div>
                                    <span class="text-12 mx-2" style="color: #95A4FC;">In Progress</span>
                                </div>
                            </td>

                        </tr>
                    </table>

                </div>


                <div class="col-12 d-flex justify-content-between my-4 rounded-4 bg-silver" style="min-height: 250px;">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script src="/js/client/referral_program.js"></script>

<script>
    $(document).ready(function () {
        $(".span_coming").click(function () {
            $(".span_coming").removeClass('text-secondary').addClass('text-white');
            $(".span_orders").removeClass('text-white').addClass('text-secondary');

            $(".table_coming").removeClass('d-none');
            $(".table_orders").addClass('d-none');
        });

        $(".span_orders").click(function () {
            $(".span_orders").removeClass('text-secondary').addClass('text-white');
            $(".span_coming").removeClass('text-white').addClass('text-secondary');

            $(".table_orders").removeClass('d-none');
            $(".table_coming").addClass('d-none');
        });
    });
</script>

<style>
    .input-price-seller {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
    }

    input[type=date]::-webkit-calendar-picker-indicator {
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
    }
</style>

</body>
</html>