<?php


namespace App\Classes;


use Allanvb\LaravelSemysms\Exceptions\SmsNotSentException;
use Allanvb\LaravelSemysms\Facades\SemySMS;
use App\Enums\FoodStatusEnum;
use App\Parts\Models\Fastoran\OrderDetail;
use App\Parts\Models\Fastoran\Promocode;
use App\Parts\Models\Fastoran\RestMenu;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Exceptions\TelegramResponseException;
use Telegram\Bot\Laravel\Facades\Telegram;
use Yandex\Geocode\Exception;
use Yandex\Geocode\Facades\YandexGeocodeFacade;

/**
 * Trait Utilits
 * @package App\Classes
 */
trait Utilits
{

    /**
     * @param $phone
     * @return string|string[]
     */
    public function preparePhone($phone)
    {
        $vowels = array("(", ")", "-", " ");
        return str_replace($vowels, "", $phone ?? '');
    }


    /**
     * @return |null
     */
    public function getUser()
    {

        $id = auth()->guard('api')->user()->id ?? auth()->user()->id ?? null;

        return !is_null($id) ? User::find($id) : null;

    }


    /**
     * @param $phone
     * @param $message
     */
    public function sendSms($phone, $message)
    {
        try {
            SemySMS::sendOne([
                'to' => $phone,
                'text' => $message,
                'device_id' => 'active'
            ]);

        } catch (\Exception $e) {
            Log::error(sprintf("%s:%s %s",
                $e->getLine(),
                $e->getFile(),
                $e->getMessage()
            ));
        }

    }

    /**
     * @param $id
     * @param $message
     * @param array $keyboard
     */
    public function sendToTelegram($id, $message, $keyboard = [])
    {
        try {
            $this->sendMessageToTelegramChannel($id, $message, $keyboard);
            $this->sendMessageToTelegramChannel(env("TELEGRAM_CHANNEL_MAIN"), $message);
        } catch (TelegramResponseException $e) {
            Log::error(sprintf("%s:%s %s",
                $e->getLine(),
                $e->getFile(),
                $e->getMessage()
            ));
        }

    }

    /**
     * @param int $number
     * @param int $length
     * @return string
     */
    public function prepareNumber($number = 0, $length = 10)
    {
        $tmp = "" . $number;
        while (strlen($tmp) < $length)
            $tmp = "0" . $tmp;

        return $tmp;
    }


    /**
     * @param $id
     * @param $message
     * @param array $keyboard
     */
    protected function sendMessageToTelegramChannel($id, $message, $keyboard = [])
    {
        try {
            Telegram::sendMessage([
                'chat_id' => $id,
                'parse_mode' => 'Markdown',
                'text' => $message,
                'reply_markup' => json_encode([
                    'inline_keyboard' => $keyboard
                ])
            ]);
        } catch (\Exception $e) {
            Log::error(sprintf("%s:%s %s",
                $e->getLine(),
                $e->getFile(),
                $e->getMessage()
            ));
        }

    }

    public function prepareChannelId($channelName)
    {
        try {
            $content = file_get_contents("https://api.telegram.org/bot" . env("TELEGRAM_BOT_TOKEN") . "/getChat?chat_id=@$channelName");
        } catch (\Exception $e) {
            $content = [];
        }

        return json_decode($content)->result->id ?? null;
    }

}
