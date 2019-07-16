<?php
class EmployeeController {
    public function getEmployeeList(Request $request)
    {
        $users = Employee::select('id', 'first_name', 'last_name', 'employee_code')->orderBy('id', "desc")->paginate(8);
        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'data' => $users
        ];
        return response()->json($response);
    
    
    }
}
