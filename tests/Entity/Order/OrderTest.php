<?php

namespace Tests\App\Entity;

use App\Entity\Order\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testOrderNote(): void
    {
        // Test ustawienia notatki
        $order = new Order();
        $order->setNote('Test note');

        $this->assertEquals('Test note', $order->getNote());
    }

    public function testOrderNoteIsInitiallyNull(): void
    {
        // Test, czy notatka jest początkowo null
        $order = new Order();

        $this->assertNull($order->getNote(), 'Note should initially be null');
    }

    public function testOrderNoteCanBeCleared(): void
    {
        // Test ustawienia notatki, a następnie jej usunięcia (ustawienie na null)
        $order = new Order();
        $order->setNote('Test note');
        $this->assertEquals('Test note', $order->getNote());

        $order->setNote(null);
        $this->assertNull($order->getNote(), 'Note should be null after being cleared');
    }

    public function testOrderNoteWithEmptyString(): void
    {
        // Test ustawienia pustej notatki
        $order = new Order();
        $order->setNote('');
        $this->assertEquals('', $order->getNote(), 'Note should be an empty string if set to an empty string');
    }

    public function testSetAndGetOrderNumber(): void
    {
        // Test ustawienia i odczytu numeru zamówienia
        $order = new Order();
        $order->setNumber('ORDER123');

        $this->assertEquals('ORDER123', $order->getNumber(), 'Order number should be correctly set and retrieved');
    }

    public function testOrderWithLongNote(): void
    {
        // Test ustawienia notatki o maksymalnej długości (500 znaków)
        $longNote = str_repeat('a', 500);
        $order = new Order();
        $order->setNote($longNote);

        $this->assertEquals($longNote, $order->getNote(), 'Order note should allow up to 500 characters');
        $this->assertEquals(500, strlen($order->getNote()), 'Note length should be 500 characters');
    }
}
