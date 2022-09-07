<?php

namespace App\Http\Traits\Back\Sms;

trait CanSendSmsTrait
{
    private string $phone_number;
    private string $resetPatternCode = "tk10rj4igf6jggg";
    private string $verifyPatternCode = "fbu3uqj5zoozbo8";
    private string $adminPatternCode = "ctjlg8d7gdquuc6";
    private string $twoStepCode = "xtm1pbxt08nlhju";

    public string $VERIFY = 'verify-account';
    public string $RESET = 'reset-password';
    public string $TWO_STEP = 'two-step';

    public function sendText($phone_number, $text, $mode = "verify-account"): bool|string
    {
        $this->phone_number = $phone_number;

        if ($mode == $this->VERIFY)
            return $this->sendByPattern($this->verifyPatternCode, array('verification-code' => $text));
        elseif ($mode == $this->RESET)
            return $this->sendByPattern($this->resetPatternCode, array('reset-link' => $text));
        elseif ($mode == $this->TWO_STEP)
            return $this->sendByPattern($this->twoStepCode, array('verification-code' => $text));
        else
            return $this->sendByPattern($this->adminPatternCode, array('profile-text' => $text));
    }

    private function sendByPattern($pattern_code, $input_data): bool|string
    {
        $to = array($this->phone_number);

        $url = 'https://ippanel.com/patterns/pattern' .
            '?username=' . env('FARAZSMS_USERNAME') .
            '&password=' . urlencode(env('FARAZSMS_PASSWORD')) .
            '&from=' . env('FARAZSMS_PHONE_NUMBER') .
            '&to=' . json_encode($to) .
            '&input_data=' . urlencode(json_encode($input_data)) .
            '&pattern_code=' . $pattern_code;

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($handler);
    }
}
