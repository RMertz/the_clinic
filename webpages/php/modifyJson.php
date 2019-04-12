<?php


class modifyJson
{
    public function __construct()
    {

    }

    public function modify($json, $l2, $l3, $l4, $directions, $re, $reason){
        switch ($l2) {
            case 1:
                $json = $json['option1'];
                switch ($l3) {
                    case 1:
                        $json = $json['option1'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    case 2:
                        $json = $json['option2'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    case 3:
                        $json = $json['option3'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    default:
                        $json['directions'] = $directions;
                        $json['re-eval'] = $re;
                        $json['reason'] = $reason;
                        break;
                }
                break;
            case 2:
                $json = $json['option2'];
                switch ($l3) {
                    case 1:
                        $json = $json['option1'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    case 2:
                        $json = $json['option2'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    case 3:
                        $json = $json['option3'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    default:
                        $json['directions'] = $directions;
                        $json['re-eval'] = $re;
                        $json['reason'] = $reason;
                        break;
                }
                break;
            case 3:
                $json = $json['option3'];
                switch ($l3) {
                    case 1:
                        $json = $json['option1'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    case 2:
                        $json = $json['option2'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    case 3:
                        $json = $json['option3'];
                        switch ($l4) {
                            case 1:
                                $json['option1']['directions'] = $directions;
                                $json['option1']['re-eval'] = $re;
                                $json['option1']['reason'] = $reason;
                                break;
                            case 2:
                                $json['option2']['directions'] = $directions;
                                $json['option2']['re-eval'] = $re;
                                $json['option2']['reason'] = $reason;
                                break;
                            case 3:
                                $json['option3']['directions'] = $directions;
                                $json['option3']['re-eval'] = $re;
                                $json['option3']['reason'] = $reason;
                                break;
                            default:
                                $json['directions'] = $directions;
                                $json['re-eval'] = $re;
                                $json['reason'] = $reason;
                                break;
                        }
                        break;
                    default:
                        $json['directions'] = $directions;
                        $json['re-eval'] = $re;
                        $json['reason'] = $reason;
                        break;
                }
            default:
                $json['directions'] = $directions;
                $json['re-eval'] = $re;
                $json['reason'] = $reason;
                break;
        }
    return $json;
    }
}