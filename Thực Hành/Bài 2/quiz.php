<?php
// Đọc nội dung từ tệp questions.txt
$filename = "quiz.txt";

if (!file_exists($filename)) {
    die("File câu hỏi không tồn tại.");
}

$file_content = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$questions = [];
$current_question = null;

foreach ($file_content as $line) {
    $line = trim($line);
    if (strpos($line, "Câu") === 0) {
        if ($current_question) {
            $questions[] = $current_question;
        }
        $current_question = ["question" => $line, "options" => [], "answer" => null];
    } elseif (strpos($line, "ANSWER:") === 0) {
        $current_question["answer"] = trim(substr($line, strpos($line, ":") + 1));
    } else {
        $current_question["options"][] = $line;
    }
}

if ($current_question) {
    $questions[] = $current_question;
}

$score = null;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = 0;
    foreach ($questions as $index => $q) {
        $userAnswer = $_POST["question" . ($index + 1)] ?? null;
        if ($userAnswer === $q["answer"]) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Thi Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bài Thi Trắc Nghiệm</h1>
    <?php if ($score === null): ?>
        <form method="POST" action="">
            <?php foreach ($questions as $index => $q): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <strong><?= htmlspecialchars($q["question"]) ?></strong>
                    </div>
                    <div class="card-body">
                        <?php foreach ($q["options"] as $option): ?>
                            <?php $optionValue = substr($option, 0, 1); ?>
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="radio" 
                                       name="question<?= $index + 1 ?>" 
                                       id="q<?= $index + 1 . $optionValue ?>" 
                                       value="<?= $optionValue ?>" 
                                       required>
                                <label class="form-check-label" for="q<?= $index + 1 . $optionValue ?>">
                                    <?= htmlspecialchars($option) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    <?php else: ?>
        <div class="alert alert-success text-center">
            Bạn đã trả lời đúng <strong><?= $score ?></strong>/<?= count($questions) ?> câu hỏi.
        </div>
        <a href="index.php" class="btn btn-primary">Làm lại bài thi</a>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
