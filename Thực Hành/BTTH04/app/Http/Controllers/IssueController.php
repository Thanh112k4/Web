<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{


    public function index()
    {
        $issues = Issue::join('computers', 'issues.computer_id', '=', 'computers.id')
            ->select('issues.id', 'computers.computer_name', 'computers.model', 'issues.reported_by', 
                     'issues.reported_date', 'issues.urgency', 'issues.status')
            ->paginate(10);
    
        return view('issues.index', compact('issues'));
    }
    
public function create()
{
    $computers = Computer::all();
    return view('issues.create', compact('computers'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'computer_id' => 'required',
        'model' => 'required|string|max:255',
        'reported_by' => 'required|string|max:255',
        'reported_date' => 'required|date',
        'urgency' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Open,In Progress,Resolved',
    ]);

    // Gán giá trị mặc định nếu description không được nhập
    $validatedData['description'] = $request->input('description', '');

    Issue::create($validatedData);

    return redirect()->route('issues.index')->with('success', 'Vấn đề đã được thêm thành công!');
}

public function edit($id)
{
    $issue = Issue::findOrFail($id); // Lấy thông tin vấn đề từ cơ sở dữ liệu
    $computers = Computer::all(); // Danh sách máy tính
    $issue->reported_date = \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d');
    return view('issues.edit', compact('issue', 'computers'));
}


public function update(Request $request, $id)
{
    // Xác thực dữ liệu
    $request->validate([
        'computer_id' => 'required|exists:computers,id',
        'reported_by' => 'nullable|string|max:50',
        'reported_date' => 'required|date',
        'description' => 'nullable|string', // Nếu không bắt buộc, dùng nullable
        'urgency' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Open,In Progress,Resolved',
    ]);

    // Tìm vấn đề
    $issue = Issue::findOrFail($id); 
    
    // Cập nhật dữ liệu
    $validatedData = $request->only(['computer_id', 'reported_by', 'reported_date', 'description', 'urgency', 'status']);
    $issue->update($validatedData); 

    // Chuyển hướng về trang danh sách và hiển thị thông báo
    return redirect()->route('issues.index')->with('success', 'Thông tin vấn đề đã được cập nhật!');
}

public function destroy($id)
{
    $issue = Issue::findOrFail($id); 
    $issue->delete(); 
    return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
}


}