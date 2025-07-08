<?php

namespace Server\Handler;

interface Handler {
    public function handle($request);
}

class LoginHandler implements Handler {
    public function handle($request) {
        // 로그인 처리 로직
        return new Response();
    }
}