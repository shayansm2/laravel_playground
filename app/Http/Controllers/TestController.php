<?php

namespace App\Http\Controllers;

use App\Rules\CheckPrime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TestController extends Controller
{
    public function form(Request $request): string
    {
        $request->validate([
            'number' => ['required', new CheckPrime(20)]
        ]);

        return "OK!";
    }

    public function index()
    {
        return view('index');
    }

    public function handleRequest(Request $request)
    {
        $request->validate([
            'mobile' => ['required_with:name,message'],
            'message' => ['required_with_all:name,mobile', 'max:100'],
            'captcha' => ['required', Rule::in(16, 10, 76)],
        ]);
    }

    public function keyboard(Request $request)
    {
        $text = $this->convert($request->text);
        return view('keybord', ['text' => $text]);
    }

    protected function convert($text): string
    {
        $alpha = [
            'a' => 'ش',
            'b' => 'ذ',
            'c' => 'ز',
            'd' => 'ی',
            'e' => 'ث',
            'f' => 'ب',
            'g' => 'ل',
            'h' => 'ا',
            'i' => 'ه',
            'j' => 'ت',
            'k' => 'ن',
            'l' => 'م',
            'm' => 'پ',
            'n' => 'د',
            'o' => 'خ',
            'p' => 'ح',
            'q' => 'ض',
            'r' => 'ق',
            's' => 'س',
            't' => 'ف',
            'u' => 'ع',
            'v' => 'ر',
            'w' => 'ص',
            'x' => 'ط',
            'y' => 'غ',
            'z' => 'ظ',
            ';' => 'ک',
            '\'' => 'گ',
            ',' => 'و',
            '[' => 'ج',
            ']' => 'چ',
            '`' => 'ژ',
            ' ' => ' '
        ];

        $convertor = function (string $char) use ($alpha) {
            return $alpha[$char];
        };

        return implode('', array_values(array_map($convertor, str_split($text))));
    }
}
