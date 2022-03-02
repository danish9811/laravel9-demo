

### weather api json response via http method
![Screenshot from 2022-03-02 14-19-09](https://user-images.githubusercontent.com/100212323/156332503-6a4b4b3b-21f5-4e4d-9f76-bbaad8fb882c.png)

### json response via otif curl lib
![Screenshot from 2022-03-02 14-23-10](https://user-images.githubusercontent.com/100212323/156332933-97eabd75-b0ba-45b6-84f5-0dabc0fab670.png)

### json response via curl 
![Screenshot from 2022-03-02 14-24-04](https://user-images.githubusercontent.com/100212323/156333093-e11a31ac-f338-4371-9017-4c287d0e18ff.png)



### the method i wrote and made it better
## the APiContorllerClass https://github.com/danish9811/laravel9-demo/blob/master/app/Http/Controllers/UserAuthController.php

![Screenshot from 2022-03-02 14-05-46](https://user-images.githubusercontent.com/100212323/156330131-408cdf59-95ef-4d30-a50e-c05cdfa1485d.png)


### user is successfully added, key generated, and route protected via `auth:api` middleware is also accessed after loggin in
`Route::apiResource('/employee', EmployeeController::class)->middleware('auth:api');`

![Screenshot from 2022-03-02 14-08-30](https://user-images.githubusercontent.com/100212323/156330493-0cd0069d-3d85-49fe-bb0b-dc578e543064.png)


### the routes
```php
// api routes
Route::get('/get-weather-via-http', [MesonetApiController::class, 'getMesonetApiResultViaHttp']);
Route::get('/get-weather-via-otif-curl', [MesonetApiController::class, 'getMesonetApiResultViaOtifCurl']);
Route::get('/get-weather-via-curl', [MesonetApiController::class, 'getMesonetApiResultViaCurl']);

// passport protected routes via auth middleware
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);
Route::apiResource('/employee', EmployeeController::class)->middleware('auth:api');
```
### created api and its resource methods
```php

class EmployeeController extends Controller {

    public function index() {
        $employees = Employee::all();
        return response([
            'employees' => EmployeeResource::collection($employees),
            'message' => 'Successful'
        ], 200);
    }


    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|max:30',
            'age' => 'required|max:30',
            'job' => 'required|max:30',
            'salary' => 'required|max:30'
        ]);

        $employee = Employee::create($data);

        return response([
            'employee' => new EmployeeResource($employee),
            'message' => 'Success'
        ], 200);
    }


    public function show(Employee $employee) {
        if ($employee->exists) {
            return response([
                'employee' => new EmployeeResource($employee),
                'message' => 'Success'
            ], 200);
        }

        return response([
            'message' => 'employee does not exist',
        ], 404);
    }


    public function update(Request $request, Employee $employee) {
        $employee->update($request->all());
        return response([
            'employee' => new EmployeeResource($employee),
            'message' => 'Successfully updated record'
        ], 200);
    }


    public function destroy(Employee $employee) {
        $employee->delete();
        return response([
            'message' => 'Employee ' . $employee->name . ' deleted'
        ]);
    }
}
```


