
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa vấn đề</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Chỉnh sửa vấn đề</h2>

    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Mã vấn đề</label>
            <input type="text" id="code" name="code" class="form-control" value="{{ $issue->id }}" disabled>
        </div>

        <div class="form-group">
            <label for="computer_id">Tên máy tính</label>
            <select id="computer_id" name="computer_id" class="form-control">
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" 
                        {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                        {{ $computer->computer_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
                            <label for="model">Tên phiên bản</label>
                            <select class="form-control" id="model" name="model" required>
                                @foreach($computers as $computer)
                                <option value="{{ $computer->id }}"
                                    {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>
                                    {{ $computer->model }}</option>
                                @endforeach
                            </select>
                        </div>

        <div class="form-group">
            <label for="reported_by">Người báo cáo</label>
            <input type="text" id="reported_by" name="reported_by" class="form-control" value="{{ $issue->reported_by }}">
        </div>

        <div class="form-group">
            <label for="reported_date">Thời gian báo cáo</label>
            <input type="date" id="reported_date" name="reported_date" class="form-control" value="{{ $issue->reported_date }}">
        </div>

        <div class="form-group">
            <label for="urgency">Mức độ sự cố</label>
            <select id="urgency" name="urgency" class="form-control">
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Thấp</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Trung bình</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>Cao</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select id="status" name="status" class="form-control">
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Mở</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Đã giải quyết</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
