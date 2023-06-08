<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Kirimemail;
use App\Models\M_Permohonandata;

class Kirimemail extends BaseController
{
    public function __construct()
    {
        $this->M_Kirimemail = new M_Kirimemail();
        $this->M_Permohonandata = new M_Permohonandata();
        helper('form');
        helper('date');
    }

    public function index()
    {
        $currentpage = $this->request->getVar('page_kirimemail') ? $this->request->getVar('page_kirimemail') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kirimemail = $this->M_Kirimemail->search($keyword);
        } else {
            $kirimemail = $this->M_Kirimemail;
        }

        $data = [
            'title' => 'Kirim Email',
            'kirimemail' => $kirimemail->join('permohonan', 'permohonan.id_pemohon = kirimemail.id_pemohon', 'left')
                ->orderBy('id_kirim', 'DESC')
                ->paginate(10, 'kirimemail'),
            'pager' => $this->M_Kirimemail->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/kirimemail'
        ];
        return view('layout/wrapper', $data);
    }

    public function compose()
    {
        $data = [
            'title' => 'Compose',
            'isi' => 'admin/compose'
        ];

        return view('layout/wrapper', $data);
    }

    public function reply()
    {
        $currentpage = $this->request->getVar('page_permohonan') ? $this->request->getVar('page_permohonan') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $replytiket = $this->M_Permohonandata->search($keyword);
        } else {
            $replytiket = $this->M_Permohonandata;
        }

        $data = [
            'title' => 'Kirim Email',
            'replytiket' => $replytiket->join('instansi', 'instansi.id_int = permohonan.id_int')
                ->where('permohonan.status_tiket', 2)
                ->where('permohonan.solved', null)
                ->orderBy('id_pemohon', 'DESC')
                ->paginate(10, 'prosespermohonan'),
            'pager' => $this->M_Permohonandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/reply'
        ];
        return view('layout/wrapper', $data);
    }

    public function send()
    {
        helper(['form']);

        $emailModel = new M_Kirimemail();

        $validationRules = [
            'alamat_email' => 'required',
            'subject' => 'required',
            'isi_email' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $attachment = $this->request->getFile('lampiran');
        $attachmentName = '';

        if ($attachment && $attachment->isValid() && !$attachment->hasMoved()) {
            $attachmentName = $attachment->getName();
            $attachment->move('files/lampiran');
        }

        $data = [
            'id_pemohon' => $this->request->getPost('id_pemohon'),
            'alamat_email' => $this->request->getPost('alamat_email'),
            'subject' => $this->request->getPost('subject'),
            'lampiran' => $attachmentName,
            'isi_email' => $this->request->getPost('isi_email')
        ];

        $emailModel->insert($data);

        // Send Email
        $email = \Config\Services::email();

        $email->setFrom('ppid.puncakjaya@outlook.com', 'PPID PUNCAK JAYA');
        $email->setTo($data['alamat_email']);
        $email->setSubject($data['subject']);
        $email->setMessage($data['isi_email']);

        if ($data['lampiran'] != '') {
            $email->attach(WRITEPATH . 'files/lampiran/' . $data['lampiran']);
        }

        if ($email->send()) {
            // Email sent successfully
            // Additional logic or redirection
            return redirect()->to('kirimemail')->with('pesan', 'Email sent successfully!');
        } else {
            // Failed to send email
            // Additional logic or redirection
            return redirect()->back()->with('pesan', 'Failed to send email.');
        }
    }
    public function resend()
    {
        // Mengambil nilai yang dikirim melalui permintaan POST
        $alamatEmail = $this->request->getPost('alamat_email');
        $subject = $this->request->getPost('subject');
        $lampiran = $this->request->getPost('lampiran');
        $isiEmail = $this->request->getPost('isi_email');

        // Send Email
        $email = \Config\Services::email();

        $email->setFrom('ppid.puncakjaya@outlook.com', 'PPID PUNCAK JAYA');
        $email->setTo($alamatEmail);
        $email->setSubject($subject);
        $email->setMessage($isiEmail);

        if ($lampiran != '') {
            $email->attach(WRITEPATH . 'files/lampiran/' . $lampiran);
        }

        if ($email->send()) {
            // Email sent successfully
            // Additional logic or redirection
            return redirect()->back()->with('pesan', 'Email sent successfully!');
        } else {
            // Failed to send email
            // Additional logic or redirection
            return redirect()->back()->with('pesan', 'Failed to send email.');
        }
    }
}
