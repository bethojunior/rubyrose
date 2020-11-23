<?php


namespace App\Services\User;


use App\Constants\UserConstant;
use App\Constants\UserStatusConstant;
use App\Http\Responses\ApiResponse;
use App\Repositories\User\UserRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $repository;

    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll(){
        return $this->repository->findAll();
    }

    /**
     * @param User $user
     * @param array $request
     * @return User
     */
    public function update(User $user, array $request)
    {

        $user->name = $request['name'] ?? $user->name;
        $user->email = $request['email'] ?? $user->email;
        $user->phone = $request['phone'] ?? $user->phone;
        $user->password = isset($request['password']) ?
            bcrypt($request['password']) :
            $user->password;

        $user->save();

        return $user;
    }

    /**
     * @param array $request
     * @return User
     * @throws \Exception
     */
    public function insertUser(array $request)
    {
        try{
            DB::beginTransaction();


            $data = [
                'name'              => $request['name'],
                'email'             => $request['email'],
                'phone'             => $request['phone'],
                'user_type_id'      => $request['user_type_id'],
                'user_status_id'    => UserStatusConstant::ACTIVE,
                'password'          => Hash::make($request['password']),
            ];

            $user = new User($data);

            $user->save();

            DB::commit();

        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        return $user;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function delete($id)
    {
        try{
            DB::beginTransaction();
            $result = $this->repository->find($id);
            $result->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

        return $result;
    }

}
