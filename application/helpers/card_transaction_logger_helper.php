<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('logTransaction')) {
    /**
     * Logs a transaction with amount change, transaction type, and resulting balance.
     *
     * @param int $userId The ID of the user.
     * @param string $transactionType The type of transaction (e.g., 'deposit', 'withdrawal').
     * @param float $amount The transaction amount (positive for deposit, negative for withdrawal).
     * @param float $balanceAfter The user's balance after the transaction.
     * @param bool $toDatabase Whether to log this message to the database (default: false).
     */
    function logcardTransaction($currentUserId, $createdby, $userId, $cardmemberId, $transactionType, $amount, $balanceAfter, $transaction_date, $toDatabase = false) {
        // Load CodeIgniter instance
        $CI =& get_instance();
        
        // Timestamp and message formatting
        $timestamp = date("Y-m-d H:i:s");
        $logMessage = "[$timestamp] UserID: $userId, Type: $transactionType, Amount: " 
                      . (($amount >= 0) ? '+' : '') . "$amount, Balance After: $balanceAfter" . PHP_EOL;

        // Log to file
        $logFile = APPPATH . 'logs/card_transaction_history.log';
        file_put_contents($logFile, $logMessage, FILE_APPEND);

        // Optionally log to database
        if ($toDatabase) {
            $CI->load->database();
            $CI->db->insert('card_transaction_log', [
                'user_id' => $userId,
                'cardmember_id' => $cardmemberId,
                'transaction_type' => $transactionType,
                'amount' => $amount,
                'balance_after' => $balanceAfter,
                'transaction_date' => $transaction_date,
                'trasaction_createdBy' => $createdby,
                'createdAt' => $timestamp,
                'createdBy' => $currentUserId
            ]);
        }
    }
}