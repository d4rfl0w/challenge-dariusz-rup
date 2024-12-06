<?php

namespace App\Controller;

use App\Entity\Order\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/admin/orders/{id}/note', name: 'app_order_note_update', methods: ['POST'])]
    public function updateOrderNote(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $note = $request->request->get('note');
        $order = $entityManager->getRepository(Order::class)->find($id);

        if (!$order) {
            throw $this->createNotFoundException('Zamówienie nie zostało znalezione.');
        }

        $order->setNote($note);
        $entityManager->flush();

        $this->addFlash('success', 'Notatka została zapisana.');

        return $this->redirectToRoute('sylius_admin_order_show', ['id' => $id]);
    }
}
