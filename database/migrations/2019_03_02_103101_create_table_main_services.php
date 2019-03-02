<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Packages\Shop\Constants\MainServiceConfig;

class CreateTableMainServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(MainServiceConfig::MAIN_SERVICES_TBL, function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('desc');
            $table->string('icon');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        $defaultServices = [
            [
                'title' => "Giao hàng toàn quốc",
                'desc'  => "<p>Soria Beauty hỗ trợ giao hàng trên toàn quốc</p>",
                'icon'  => "icon-f-37",
                'order' => 1,
            ],
            [
                'title' => "Thanh toán khi nhận hàng (COD)",
                'desc' => "<p>Soria Beauty hỗ trợ phương thức thanh toán khi nhận hàng (COD)</p>",
                'icon' => "icon-e-47",
                'order' => 2,
            ],
            [
                'title' => "Freeship",
                'desc' => "<p>Soria Beauty miễn phí giao hàng với đơn hàng >600k</p>",
                'icon' => "icon-f-48",
                'order' => 3,
            ],
            [
                'title' => "Tư vấn",
                'desc' => "<p>Soria Beauty sẵn sàng tư vấn cho bạn qua số điện thoại:</p><p>(0372) 744 289</p>",
                'icon' => "icon-f-93",
                'order' => 4,
            ],
            [
                'title' => "Email",
                'desc' => "<p>Mọi thắc mắc hay yêu cầu hỗ trợ, vui lòng gửi email tới:</p><p>soriabeauty@gmail.com</p>",
                'icon' => "icon-f-72",
                'order' => 5,
            ],
        ];
        DB::table(MainServiceConfig::MAIN_SERVICES_TBL)->insert($defaultServices);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(MainServiceConfig::MAIN_SERVICES_TBL);
    }
}
