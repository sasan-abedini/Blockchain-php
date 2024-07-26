<?php

class Blockchain {
    public $chain = [];
    public $current_transactions = [];

    public function __construct() {
        // ایجاد بلاک جنسیس
        $this->new_block(100, '1');
    }

    public function new_block($proof, $previous_hash = null) {
        $block = [
            'index' => count($this->chain) + 1,
            'timestamp' => time(),
            'transactions' => $this->current_transactions,
            'proof' => $proof,
            'previous_hash' => $previous_hash ?? $this->hash(end($this->chain)),
        ];

        // بازنشانی لیست تراکنش‌های جاری
        $this->current_transactions = [];
        $this->chain[] = $block;
        return $block;
    }

    public function new_transaction($sender, $recipient, $amount) {
        $this->current_transactions[] = [
            'sender' => $sender,
            'recipient' => $recipient,
            'amount' => $amount,
        ];

        return end($this->chain)['index'] + 1;
    }

    public function hash($block) {
        return hash('sha256', json_encode($block));
    }

    public function last_block() {
        return end($this->chain);
    }

    public function proof_of_work($last_proof) {
        $proof = 0;
        while (!$this->valid_proof($last_proof, $proof)) {
            $proof++;
        }

        return $proof;
    }

    public function valid_proof($last_proof, $proof) {
        $guess = "{$last_proof}{$proof}";
        $guess_hash = hash('sha256', $guess);
        return substr($guess_hash, 0, 4) === "0000";
    }
}

// ساختن یک نمونه از بلاکچین
$blockchain = new Blockchain();

$node_identifier = uniqid();

function mine() {
    global $blockchain, $node_identifier;

    $last_block = $blockchain->last_block();
    $last_proof = $last_block['proof'];
    $proof = $blockchain->proof_of_work($last_proof);

    $blockchain->new_transaction("0", $node_identifier, 1);

    $previous_hash = $blockchain->hash($last_block);
    $block = $blockchain->new_block($proof, $previous_hash);

    return [
        'message' => "New Block Forged",
        'index' => $block['index'],
        'transactions' => $block['transactions'],
        'proof' => $block['proof'],
        'previous_hash' => $block['previous_hash'],
    ];
}

function new_transaction($sender, $recipient, $amount) {
    global $blockchain;

    $index = $blockchain->new_transaction($sender, $recipient, $amount);

    return ['message' => "Transaction will be added to Block $index"];
}

function full_chain() {
    global $blockchain;

    return [
        'chain' => $blockchain->chain,
        'length' => count($blockchain->chain),
    ];
}

// استفاده از PHP برای ساخت API
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/mine') {
    echo json_encode(mine());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/transactions/new') {
    $values = json_decode(file_get_contents('php://input'), true);

    if (!isset($values['sender']) || !isset($values['recipient']) || !isset($values['amount'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Missing values']);
    } else {
        echo json_encode(new_transaction($values['sender'], $values['recipient'], $values['amount']));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/chain') {
    echo json_encode(full_chain());
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Not found']);
}
?>
