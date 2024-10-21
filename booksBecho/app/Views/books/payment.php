<?php
// payment.php
$username = session()->getFlashdata('username');
$email = session()->getFlashdata('email');
$total = session()->getFlashdata('total');
$booksJson = session()->getFlashdata('books');
$books = json_decode($booksJson, true); // Decode the JSON string into an array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - BooksBecho</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f4f4f4; /* Adjust background as needed */
        }
        .header-content {
            text-align: right; /* Align logo and address to the right */
        }
        .logo {
            margin-bottom: 5px; /* Space between logo and address */
        }
        .qr-code {
            margin-left: 20px; /* Space between QR code and the header content */
        }
        .company-info {
            font-size: 14px;
        }
        .order-details {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #28a745;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
        .footer img {
            max-width: 150px;
        }
    </style>
</head>
<body>
<div id="pdf-content">
    <div class="header">
        <div class="header-content">
            <img src="uploads/logo/[removal.ai]_2919cdff-3693-4cb8-b073-19c194773e0d-1000172470.png" alt="Company Logo" style="width: 150px;" class="logo">
            <div class="company-info">
                <p>Raniganj, West Bengal, 713347</p>
            </div>
        </div>
        <img src="frame.png" alt="QR Code" style="width: 100px;" class="qr-code"> <!-- Add path to your QR code -->
    </div>

    <div class="order-details">
        <h1>Order Details</h1>
        <p><strong>Name:</strong> <?= $username; ?></p>

        <h2>Book Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($books)): ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?= $book['name']; ?></td>
                            <td><?= $book['author']; ?></td>
                            <td>₹<?= number_format($book['price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No books in your order.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <p class="total">Total Amount: ₹<?= number_format($total, 2); ?></p>
        <button id="download">Download PDF</button>
    </div>

    <div class="footer">
        <img src="uploads/logo/[removal.ai]_2919cdff-3693-4cb8-b073-19c194773e0d-1000172470.png" alt="Company Logo">
        <p>Thank you for choosing BooksBecho!</p>
    </div>
</div>

<script>
    document.getElementById('download').addEventListener('click', function () {
        const element = document.getElementById('pdf-content');
        html2pdf()
            .from(element)
            .save('order-details.pdf');
    });
</script>

</body>
</html>
