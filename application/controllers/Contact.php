<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Frontend_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Contact_m');
	}

	public function index (){
		$data['addONS'] = 'contact_us';

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view($this->data['frontendDIR'].'contact', $data, TRUE);
		$this->load->view('templates/_layout_base_frontend',$data);
	}

	public function sendmessage() {
		$rules = $this->Contact_m->rules_contact;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');
        $this->form_validation->set_message('valid_email', 'Email anda tidak valid');

        if ($this->form_validation->run() == TRUE) {
			$data = $this->Contact_m->array_from_post(array('name','email','subject','desc'));

			if(!preg_match("/^[a-zA-Z ]+$/",$this->input->post('name'))){
				$data = array(
		            'title' => 'Maaf, ',
		            'text' => 'Form nama hanya memperbolehkan Alphabet dan spasi.',
		            'type' => 'danger'
		        );
		        $this->session->set_flashdata('message',$data);
				redirect('contact');
			} elseif (!preg_match("/^[a-zA-Z ]+$/",$this->input->post('subject'))) {
				$data = array(
		            'title' => 'Maaf, ',
		            'text' => 'Form judul hanya memperbolehkan Alphabet dan spasi.',
		            'type' => 'danger'
		        );
		        $this->session->set_flashdata('message',$data);
				redirect('contact');
			}
			
			$data = $this->security->xss_clean($data);
			$saving = $this->Contact_m->save($data);

			if($saving){
				if($this->sendmessagecontact($data)){
	        	$data = array(
	            	'title' => 'Sukses, ',
                    'text' => 'Pesan anda telah kami terima, kami akan merespon secepatnya.',
                    'type' => 'success'
	          	);
	        	
		   		} else {
					$data = array(
						'title' => 'Sukses, ',
	                    'text' => 'Pesan anda telah kami terima, kami akan merespon secepatnya.',
	                    'type' => 'success'
					);
	      		}
	      	} else {

					$data = array(
						'title' => 'Maaf,',
	                    'text' => 'Kami tidak dapat menyimpan pesan anda, silakan ulangi.',
	                    'type' => 'danger'
					);
	      		}
	    	$this->session->set_flashdata('message', $data);
	  		redirect('contact');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
		        $this->session->set_flashdata('message',$data);
		        $this->index();
		}
	}

	private function sendmessagecontact($data=NULL) {

		$from_email = $data['email']; //change this to yours
        $subject = 'Kontak Kami - '.$data['subject'];
        $word1 = $data['desc'];
        $address = '1234 Street Name, City Name, United States';
        $telephone = '(123) 456-789';
        $email = 'system@mahardhikatransportbatam.com';
        $message = '
        <!DOCTYPE html>
		<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="x-apple-disable-message-reformatting">
			<title>'.$subject.'</title>
				<style>
					* {
						font-family: sans-serif !important;
					}
				</style>
				<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">
		    <style>
		        html,
		        body {
			        margin: 0 auto !important;
		            padding: 0 !important;
		            height: 100% !important;
		            width: 100% !important;
		        }

		        /* What it does: Stops email clients resizing small text. */
		        * {
		            -ms-text-size-adjust: 100%;
		            -webkit-text-size-adjust: 100%;
		        }

		        /* What it does: Centers email on Android 4.4 */
		        div[style*="margin: 16px 0"] {
		            margin:0 !important;
		        }

		        /* What it does: Stops Outlook from adding extra spacing to tables. */
		        table,
		        td {
		            mso-table-lspace: 0pt !important;
		            mso-table-rspace: 0pt !important;
		        }

		        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
		        table {
		            border-spacing: 0 !important;
		            border-collapse: collapse !important;
		            table-layout: fixed !important;
		            margin: 0 auto !important;
		        }
		        table table table {
		            table-layout: auto;
		        }

		        /* What it does: Uses a better rendering method when resizing images in IE. */
		        img {
		            -ms-interpolation-mode:bicubic;
		        }

		        /* What it does: A work-around for iOS meddling in triggered links. */
		        *[x-apple-data-detectors] {
		            color: inherit !important;
		            text-decoration: none !important;
		        }

		        /* What it does: A work-around for Gmail meddling in triggered links. */
		        .x-gmail-data-detectors,
		        .x-gmail-data-detectors *,
		        .aBn {
		            border-bottom: 0 !important;
		            cursor: default !important;
		        }
		        .a6S {
			        display: none !important;
			        opacity: 0.01 !important;
		        }
		        img.g-img + div {
			        display:none !important;
			   	}

		        .button-link {
		            text-decoration: none !important;
		        }

		        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
		            .email-container {
		                min-width: 375px !important;
		            }
		        }
		    </style>
		    <style>
		        /* What it does: Hover styles for buttons */
		        .button-td,
		        .button-a {
		            transition: all 100ms ease-in;
		        }
		        .button-td:hover,
		        .button-a:hover {
		            background: #555555 !important;
		            border-color: #555555 !important;
		        }

		        /* Media Queries */
		        @media screen and (max-width: 600px) {

		            .email-container {
		                width: 100% !important;
		                margin: auto !important;
		            }

		            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
		            .fluid {
		                max-width: 100% !important;
		                height: auto !important;
		                margin-left: auto !important;
		                margin-right: auto !important;
		            }

		            /* What it does: Forces table cells into full-width rows. */
		            .stack-column,
		            .stack-column-center {
		                display: block !important;
		                width: 100% !important;
		                max-width: 100% !important;
		                direction: ltr !important;
		            }
		            /* And center justify these ones. */
		            .stack-column-center {
		                text-align: center !important;
		            }

		            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
		            .center-on-narrow {
		                text-align: center !important;
		                display: block !important;
		                margin-left: auto !important;
		                margin-right: auto !important;
		                float: none !important;
		            }
		            table.center-on-narrow {
		                display: inline-block !important;
		            }

		            /* What it does: Adjust typography on small screens to improve readability */
					.email-container p {
						font-size: 17px !important;
						line-height: 22px !important;
					}
					
		        }

		    </style>
		    
		</head>
		<body width="100%" bgcolor="#f4f4f4" style="margin: 0; mso-line-height-rule: exactly;">
		    <center style="width: 100%; background: #f4f4f4; text-align: left;">

		        <!-- Visually Hidden Preheader Text : BEGIN -->
		        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
		            '.$subject.'
		        </div>
		        <!-- Visually Hidden Preheader Text : END -->

		        <!-- Email Header : BEGIN -->
		        <table role="presentation" aria-hidden="true" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
					<tr>
						<td style="padding: 20px 0; text-align: left">
							<img src="" aria-hidden="true" width="200" height="50" alt="alt_text" border="0" style="height: auto; background: #f4f4f4; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
						</td>
		                <td valign="middle" style="padding:5px 0; text-align:right; line-height:1.1; font-family: sans-serif; font-size: 13px; color: #999999;" class="stack-column-center">
		                 Email: '.$email.'
		                </td>
					</tr>
		        </table>
		        <!-- Email Header : END -->

		        <!-- Email Body : BEGIN -->
		        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">

		            <!-- 1 Column Text + Button : BEGIN -->
		            <tr>
		                <td bgcolor="#ffffff" style="padding: 40px 40px 20px; text-align: left;">
		                    <h1 style="margin: 0; font-family: sans-serif; font-size: 24px; line-height: 27px; color: #333333; font-weight: bold;">Kontak Kami.</h1>
		                </td>
		            </tr>
		            <tr>
		                <td bgcolor="#ffffff" style="padding: 0 40px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; ">
		                <h2 style="margin: 0 0 10px 0; font-family: sans-serif; font-size: 18px; line-height: 21px; color: #333333; font-weight: bold; ">'.$subject.'</h2>
		                    <p style=" padding: 12px; background: #def0fc; border: 1px solid #444; color: #0a0a0a;">
		                    <span style="">Pengirim: '.$data['name'].' | <strong>'.$data['email'].'</strong></span>
		                    <br>
		                    <br>
		                    <span><strong>'.$subject.' - </strong> '.indonesian_date(date('Y-m-d H:i:s')).'</span>
		                    <br>
		                    "'.$word1.'"
		                    </p>
		                </td>
		            </tr>
		            <!-- 1 Column Text + Button : END -->


		        </table>
		        <!-- Email Body : END -->

		        <!-- Email Footer : BEGIN -->
		        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
		            <tr>
		                <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;" class="x-gmail-data-detectors">
		                    <webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</webversion>
		                    <br><br>
		                    Alamat<br>'.$address.'<br>'.$telephone.'
		                    <br><br><br>
		                </td>
		            </tr>
		        </table>
		        <!-- Email Footer : END -->
		    </center>
		</body>
		</html>';
						        
        //configure email settings
        $config = $this->mail_config();
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email, $data['name']);
        $this->email->to($email);
        $this->email->reply_to('system@mahardhikatransportbatam.com', 'CS Mahardhika Transport Batam');
        $this->email->cc('elvita@mahardhikatransportbatam.com');
        $this->email->bcc($data['email']);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
	}
}