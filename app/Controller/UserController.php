<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Request\UserRequest;
use Hyperf\HttpServer\Contract\RequestInterface;
use Swoole\Http\Status;

class UserController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        return User::get();
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if (null === $user) {
            return $this->response->withStatus(Status::NOT_FOUND);
        }
        return $user;
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        return User::create($validated);
    }

    public function delete(string $id)
    {
        User::destroy($id);
        return $this->response
            ->json(['success' => true])
            ->withStatus(Status::OK);
    }
}