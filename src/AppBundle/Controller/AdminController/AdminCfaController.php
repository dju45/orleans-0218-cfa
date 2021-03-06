<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 25/06/18
 * Time: 16:08
 */

namespace AppBundle\Controller\AdminController;

use AppBundle\Entity\Cfa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cfa controller.
 *
 * @Route("/cfabloisadmin/cfa")
 */
class AdminCfaController extends Controller
{
    /**
     * Lists all cfa entities.
     *
     * @Route("/", name="cfa_admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cfas = $em->getRepository(Cfa::class)->findAll();

        return $this->render('cfa/index.html.twig', array(
            'cfas' => $cfas,
        ));
    }

    /**
     * Creates a new cfa entity.
     *
     * @Route("/new", name="cfa_admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cfa = new Cfa();
        $form = $this->createForm('AppBundle\Form\CFAType', $cfa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cfa);
            $em->flush();

            return $this->redirectToRoute('cfa_admin_show', array('id' => $cfa->getId()));
        }

        return $this->render('cfa/new.html.twig', array(
            'cfa' => $cfa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cfa entity.
     *
     * @Route("/{id}", name="cfa_admin_show")
     * @Method("GET")
     */
    public function showAction(Cfa $cfa)
    {
        $deleteForm = $this->createDeleteForm($cfa);

        return $this->render('cfa/show.html.twig', array(
            'cfa' => $cfa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cfa entity.
     *
     * @Route("/{id}/edit", name="cfa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cfa $cfa)
    {
        $deleteForm = $this->createDeleteForm($cfa);
        $editForm = $this->createForm('AppBundle\Form\CFAType', $cfa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cfa_admin_index', array('id' => $cfa->getId()));
        }

        return $this->render('cfa/edit.html.twig', array(
            'cfa' => $cfa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cfa entity.
     *
     * @Route("/{id}", name="cfa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cfa $cfa)
    {
        $form = $this->createDeleteForm($cfa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cfa);
            $em->flush();
        }

        return $this->redirectToRoute('cfa_admin_index');
    }

    /**
     * Creates a form to delete a cfa entity.
     *
     * @param Cfa $cfa The cfa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cfa $cfa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cfa_delete', array('id' => $cfa->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
