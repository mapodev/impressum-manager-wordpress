<?php

defined('ABSPATH') or die('No script kiddies please!');

class WPImpressum
{

    private static $_de_format_address = "<h2>Angaben gemäß § 5 TMG:</h2>";
    private static $_de_format_representant = "<h2>Vertreten durch:</h2><p>[Vertreten durch: %s, %s]</p>";
    private static $_de_format_contact = "<h2>Kontakt:</h2>";
    private static $_de_format_contact_telephone = "<tr><td>Telefon:</td><td>%s</td></tr>";
    private static $_de_format_contact_telefax = "<tr><td>Telefax:</td><td>%s</td></tr>";
    private static $_de_format_contact_email = "<tr><td>E-Mail:</td><td>%s</td></tr>";
    private static $_de_format_register = "<h2>Registereintrag:</h2>";
    private static $_de_format_register_registered_in = "Eintragung im %s.";
    private static $_de_format_register_registernr = "<br>Registernummer: %s";
    private static $_de_format_register_chamber = "<br>Registergericht: %s";
    private static $_de_format_vat = "<h2>Umsatzsteuer-ID:</h2><p>Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:<br>%s</p>";
    private static $_de_format_office = "<h2>Aufsichtsbehörde:</h2><p>Aufsichtsbehörde</p><p>Berufsbezeichnung: gesetzl. Berufsbezeichnung:<br>Zuständige Kammer: %s<br>Verliehen durch: %s<br>Es gelten folgende berufsrechtliche Regelungen: %s<br></p>";
    private static $_de_disclaimer = "<h1>Haftungsausschluss (Disclaimer)</h1><p><strong>Haftung für Inhalte</strong></p> <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p> <p><strong>Haftung für Links</strong></p> <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p> <p><strong>Urheberrecht</strong></p> <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>";
    private static $_de_privacy_policy_head = "<h2>Datenschutzerklärung:</h2>";
    private static $_de_privacy_policy_general = "<p><strong>Datenschutz</strong></p><p>Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit möglich, stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdrückliche Zustimmung nicht an Dritte weitergegeben. </p><p>Wir weisen darauf hin, dass die Datenübertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitslücken aufweisen kann. Ein lückenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich. </p><p>Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten durch Dritte zur Übersendung von nicht ausdrücklich angeforderter Werbung und Informationsmaterialien wird hiermit ausdrücklich widersprochen. Die Betreiber der Seiten behalten sich ausdrücklich rechtliche Schritte im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor.</p>";
    private static $_de_privacy_policy_facebook = '<p><strong>Datenschutzerkl&auml;rung f&uuml;r die Nutzung von Facebook-Plugins (Like-Button)</strong></p> <p>Auf unseren Seiten sind Plugins des sozialen Netzwerks Facebook (Facebook Inc., 1601 Willow Road, Menlo Park, California, 94025, USA) integriert. Die Facebook-Plugins erkennen Sie an dem Facebook-Logo oder dem &quot;Like-Button&quot; (&quot;Gef&auml;llt mir&quot;) auf unserer Seite. Eine &Uuml;bersicht &uuml;ber die Facebook-Plugins finden Sie hier: <a href="http://developers.facebook.com/docs/plugins/" target="_blank">http://developers.facebook.com/docs/plugins/</a>.<br /> Wenn Sie unsere Seiten besuchen, wird &uuml;ber das Plugin eine direkte Verbindung zwischen Ihrem Browser und dem Facebook-Server hergestellt. Facebook erh&auml;lt dadurch die Information, dass Sie mit Ihrer IP-Adresse unsere Seite besucht haben. Wenn Sie den Facebook &quot;Like-Button&quot; anklicken w&auml;hrend Sie in Ihrem Facebook-Account eingeloggt sind, k&ouml;nnen Sie die Inhalte unserer Seiten auf Ihrem Facebook-Profil verlinken. Dadurch kann Facebook den Besuch unserer Seiten Ihrem Benutzerkonto zuordnen. Wir weisen darauf hin, dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der &uuml;bermittelten Daten sowie deren Nutzung durch Facebook erhalten. Weitere Informationen hierzu finden Sie in der Datenschutzerkl&auml;rung von facebook unter <a href="http://de-de.facebook.com/policy.php" target="_blank"> http://de-de.facebook.com/policy.php</a></p> <p>Wenn Sie nicht w&uuml;nschen, dass Facebook den Besuch unserer Seiten Ihrem Facebook-Nutzerkonto zuordnen kann, loggen Sie sich bitte aus Ihrem Facebook-Benutzerkonto aus.</p>';
    private static $_de_privacy_policy_analytics = '<p><strong>Datenschutzerkl&auml;rung f&uuml;r die Nutzung von Google Analytics</strong></p> <p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. ("Google"). Google Analytics verwendet sog. "Cookies", Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie erm&ouml;glichen. Die durch den Cookie erzeugten Informationen &uuml;ber Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA &uuml;bertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf dieser Webseite wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europ&auml;ischen Union oder in anderen Vertragsstaaten des Abkommens &uuml;ber den Europ&auml;ischen Wirtschaftsraum zuvor gek&uuml;rzt.</p> <p>Nur in Ausnahmef&auml;llen wird die volle IP-Adresse an einen Server von Google in den USA &uuml;bertragen und dort gek&uuml;rzt. Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports &uuml;ber die Websiteaktivit&auml;ten zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen gegen&uuml;ber dem Websitebetreiber zu erbringen. Die im Rahmen von Google Analytics von Ihrem Browser &uuml;bermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengef&uuml;hrt.</p> <p>Sie k&ouml;nnen die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer Browser-Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht s&auml;mtliche Funktionen dieser Website vollumf&auml;nglich werden nutzen k&ouml;nnen. Sie k&ouml;nnen dar&uuml;ber hinaus die Erfassung der durch das Cookie erzeugten und auf Ihre Nutzung der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die Verarbeitung dieser Daten durch Google verhindern, indem sie das unter dem folgenden Link verf&uuml;gbare Browser-Plugin herunterladen und installieren: <a href="http://tools.google.com/dlpage/gaoptout?hl=de">http://tools.google.com/dlpage/gaoptout?hl=de</a>.<p>&nbsp;</p>';
    private static $_de_privacy_policy_adsense = '<p><strong>Datenschutzerkl&auml;rung f&uuml;r die Nutzung von Google Adsense</strong></p> <p>Diese Website benutzt Google AdSense, einen Dienst zum Einbinden von Werbeanzeigen der Google Inc. (&quot;Google&quot;). Google AdSense verwendet sog. &quot;Cookies&quot;, Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website erm&ouml;glicht. Google AdSense verwendet auch so genannte Web Beacons (unsichtbare Grafiken). Durch diese Web Beacons k&ouml;nnen Informationen wie der Besucherverkehr auf diesen Seiten ausgewertet werden.</p> <p>Die durch Cookies und Web Beacons erzeugten Informationen &uuml;ber die Benutzung dieser Website (einschlie&szlig;lich Ihrer IP-Adresse) und Auslieferung von Werbeformaten werden an einen Server von Google in den USA &uuml;bertragen und dort gespeichert. Diese Informationen k&ouml;nnen von Google an Vertragspartner von Google weiter gegeben werden. Google wird Ihre IP-Adresse jedoch nicht mit anderen von Ihnen gespeicherten Daten zusammenf&uuml;hren.</p> <p>Sie k&ouml;nnen die Installation der Cookies durch eine entsprechende Einstellung Ihrer Browser Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht s&auml;mtliche Funktionen dieser Website voll umf&auml;nglich nutzen k&ouml;nnen. Durch die Nutzung dieser Website erkl&auml;ren Sie sich mit der Bearbeitung der &uuml;ber Sie erhobenen Daten durch Google in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden.</p>';
    private static $_de_privacy_policy_plus = '<p><strong>Datenschutzerkl&auml;rung f&uuml;r die Nutzung von Google +1</strong></p> <p><i>Erfassung und Weitergabe von Informationen:</i><br /> Mithilfe der Google +1-Schaltfl&auml;che k&ouml;nnen Sie Informationen weltweit ver&ouml;ffentlichen. &Uuml;ber die Google&nbsp;+1-Schaltfl&auml;che erhalten Sie und andere Nutzer personalisierte Inhalte von Google und unseren Partnern. Google speichert sowohl die Information, dass Sie f&uuml;r einen Inhalt +1 gegeben haben, als auch Informationen &uuml;ber die Seite, die Sie beim Klicken auf +1 angesehen haben. Ihre +1 k&ouml;nnen als Hinweise zusammen mit Ihrem Profilnamen und Ihrem Foto in Google-Diensten, wie etwa in Suchergebnissen oder in Ihrem Google-Profil, oder an anderen Stellen auf Websites und Anzeigen im Internet eingeblendet werden.<br /> Google zeichnet Informationen &uuml;ber Ihre +1-Aktivit&auml;ten auf, um die Google-Dienste f&uuml;r Sie und andere zu verbessern. Um die Google&nbsp;+1-Schaltfl&auml;che verwenden zu k&ouml;nnen, ben&ouml;tigen Sie ein weltweit sichtbares, &ouml;ffentliches Google-Profil, das zumindest den f&uuml;r das Profil gew&auml;hlten Namen enthalten muss. Dieser Name wird in allen Google-Diensten verwendet. In manchen F&auml;llen kann dieser Name auch einen anderen Namen ersetzen, den Sie beim Teilen von Inhalten &uuml;ber Ihr Google-Konto verwendet haben. Die Identit&auml;t Ihres Google-Profils kann Nutzern angezeigt werden, die Ihre E-Mail-Adresse kennen oder &uuml;ber andere identifizierende Informationen von Ihnen verf&uuml;gen.<br /> <br /> <i>Verwendung der erfassten Informationen:</i><br /> Neben den oben erl&auml;uterten Verwendungszwecken werden die von Ihnen bereitgestellten Informationen gem&auml;&szlig; den geltenden Google-Datenschutzbestimmungen genutzt. Google ver&ouml;ffentlicht m&ouml;glicherweise zusammengefasste Statistiken &uuml;ber die +1-Aktivit&auml;ten der Nutzer bzw. gibt diese an Nutzer und Partner weiter, wie etwa Publisher, Inserenten oder verbundene Websites. </p>';
    // TODO: end of this string needs to be cut
    private static $_de_privacy_policy_twitter = '<p><strong>Datenschutzerkl&auml;rung f&uuml;r die Nutzung von Twitter</strong></p> <p>Auf unseren Seiten sind Funktionen des Dienstes Twitter eingebunden. Diese Funktionen werden angeboten durch die Twitter Inc., Twitter, Inc. 1355 Market St, Suite 900, San Francisco, CA 94103, USA. Durch das Benutzen von Twitter und der Funktion &quot;Re-Tweet&quot; werden die von Ihnen besuchten Webseiten mit Ihrem Twitter-Account verkn&uuml;pft und anderen Nutzern bekannt gegeben. Dabei werden auch Daten an Twitter &uuml;bertragen.</p> <p>Wir weisen darauf hin, dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der &uuml;bermittelten Daten sowie deren Nutzung durch Twitter erhalten. Weitere Informationen hierzu finden Sie in der Datenschutzerkl&auml;rung von Twitter unter <a href="http://twitter.com/privacy" target="_blank">http://twitter.com/privacy</a>.</p> <p>Ihre Datenschutzeinstellungen bei Twitter k&ouml;nnen Sie in den Konto-Einstellungen unter <a href="http://twitter.com/account/settings" target="_blank">http://twitter.com/account/settings</a> &auml;ndern.</p><p><strong>Auskunft, L&ouml;schung, Sperrung</strong></p> <p>Sie haben jederzeit das Recht auf unentgeltliche Auskunft &uuml;ber Ihre gespeicherten personenbezogenen Daten, deren Herkunft und Empf&auml;nger und den Zweck der Datenverarbeitung sowie ein Recht auf Berichtigung, Sperrung oder L&ouml;schung dieser Daten. Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten k&ouml;nnen Sie sich jederzeit &uuml;ber die im Impressum angegeben Adresse des Webseitenbetreibers an uns wenden.</p>';
    private static $_de_source = '<p>Quelle: <em><a rel="nofollow" href="http://www.e-recht24.de/impressum-generator.html">http://www.e-recht24.de</a></em></p>';
    private static $_de_plugin_by = '<p>Plugin von <a href="http://www.wp-impressum.com">WP-Impressum</a></p>';

    function __construct()
    {
        // empty constructor
    }

    public function wpimpressum_update_impressum()
    {
        $impressum = "";

        $lang = strtolower(get_option("wp_impressum_language_of_impressum"));

        // standard language, can be changed later on
        if (empty($lang)) $lang = "de";
        // TODO: change key to search fore
        if(strpos($lang, "dein land") !== false) $lang = "de";

        $name = get_option("wp_impressum_name_company");
        $address = get_option("wp_impressum_address");
        $address_extra = get_option("wp_impressum_address_extra");
        $place = get_option("wp_impressum_place");
        $zip = get_option("wp_impressum_zip");

        if (!empty($name) || !empty($address) || !empty($address_extra) || !empty($place) || !empty($zip)) {
            $impressum = $this->wpimpressum_return_address($lang, $name, $address, $address_extra, $place, $zip);
        }

        // params for contact
        $telefon = get_option("wp_impressum_phone");
        $fax = get_option("wp_impressum_fax");
        $email = get_option("wp_impressum_email");

        // params for vat
        $vat = get_option("wp_impressum_vat");

        // params for register
        $register = get_option("wp_impressum_register");
        $registernr = get_option("wp_impressum_registenr");
        $chamber = get_option("wp_impressum_chamber");

        // disclaimer
        $disclaimer = get_option("wp_impressum_disclaimer");

        // privacy policy stuff
        $general_policy = get_option("wp_impressum_general_privacy_policy");
        $policy_facebook = get_option("wp_impressum_policy_facebook");
        $policy_analytics = get_option("wp_impressum_policy_google_analytics");
        $policy_adsense = get_option("wp_impressum_policy_google_adsense");
        $policy_plus = get_option("wp_impressum_policy_google_plus");
        $policy_twitter = get_option("wp_impressum_policy_twitter");

        $impressum .= $this->wpimpressum_return_contact($lang, $telefon, $fax, $email);
        $impressum .= $this->wpimpressum_return_vat($lang, $vat);
        $impressum .= $this->wpimpressum_return_register($lang, $chamber, $registernr, $register);

        if ($disclaimer) $impressum .= self::${'_' . $lang . '_disclaimer'};

        if ($policy_facebook || $policy_analytics || $policy_adsense || $policy_plus || $policy_twitter) {
            $impressum .= $this->wpimpressum_return_privacy_policy($lang, $general_policy, $policy_facebook, $policy_analytics, $policy_adsense, $policy_plus, $policy_twitter);
        }

        $impressum .= self::${'_' . $lang . '_source'};
        $impressum .= self::${'_' . $lang . '_plugin_by'};

        $page_id = get_option("wp_impressum_page");

        // break impressum update, because no post was choosen for displaying
        if(empty($page_id) || !is_numeric($page_id)) {
            return;
        }

        $page = get_post($page_id);
        $id = $page->ID;
        if ($id) {
            $impressum_post = array(
                'ID' => $page_id,
                'post_content' => $impressum
            );

            wp_update_post($impressum_post);
        }
    }

    private function wpimpressum_return_address($lang, $name, $adress, $adress_extra, $place, $zip)
    {
        $result = self::${'_' . $lang . '_format_address'};
        if(!empty($name)) $result .= $name."<br>";
        if(!empty($adress)) $result .= $adress."<br>";
        if(!empty($adress_extra)) $result .= $adress_extra."<br>";
        if(!empty($zip)) $result .= $zip." ";
        if(!empty($place)) $result .= $place."<br>";
        return $result;
    }

    private function wpimpressum_return_representant($lang, $name, $address)
    {
        return sprintf(self::${'_' . $lang . '_format_representant'}, $name, $address);
    }

    private function wpimpressum_return_contact($lang, $telefon, $fax, $email)
    {
        $result = self::${'_' . $lang . '_format_contact'};
        $result .= "<table><tbody>";
        if (!empty($telefon)) $result .= sprintf(self::${'_' . $lang . '_format_contact_telephone'}, $telefon);
        if (!empty($fax)) $result .= sprintf(self::${'_' . $lang . '_format_contact_telefax'}, $fax);
        if (!empty($email)) $result .= sprintf(self::${'_' . $lang . '_format_contact_email'}, $email);
        $result .= "</tbody></table>";
        return $result;
    }

    private function wpimpressum_return_register($lang, $register_chamber, $registernr, $register)
    {
        $result = self::${'_' . $lang . '_format_register'};
        $result .= "<p>";

        $register_registered_in = "";

        switch ($register) {
            case 1:
                $register_registered_in = _e("Kein Register");
                break;
            case 2:
                $register_registered_in = _e("Genossenschaftsregister");
                break;
            case 3:
                $register_registered_in = _e("Handelsregister");
                break;
            case 4:
                $register_registered_in = _e("Partnerschaftsregister");
                break;
            case 5:
                $register_registered_in = _e("Vereinsregister");
                break;
            default:
                $register_registered_in = _e("Kein Register");
                break;
        }

        if (!empty($register)) $result .= sprintf(self::${'_' . $lang . '_format_register_registered_in'}, $register_registered_in);
        if (!empty($registernr)) $result .= sprintf(self::${'_' . $lang . '_format_register_registernr'}, $registernr);
        if (!empty($register_chamber)) $result .= sprintf(self::${'_' . $lang . '_format_register_chamber'}, $register_chamber);
        $result .= "</p>";
        return $result;
    }

    private function wpimpressum_return_vat($lang, $vat)
    {
        if (!empty($vat)) return sprintf(self::${'_' . $lang . '_format_vat'}, $vat);
        return "";
    }

    private function wpimpressum_return_privacy_policy($lang, $general, $facebook, $analytics, $adsense, $plus, $twitter)
    {
        $result = self::${'_' . $lang . '_privacy_policy_head'};
        if (strlen($general) > 0) $result .= self::${'_' . $lang . '_privacy_policy_general'};
        if (strlen($facebook) > 0) $result .= self::${'_' . $lang . '_privacy_policy_facebook'};
        if (strlen($analytics) > 0) $result .= self::${'_' . $lang . '_privacy_policy_analytics'};
        if (strlen($adsense) > 0) $result .= self::${'_' . $lang . '_privacy_policy_adsense'};
        if (strlen($plus) > 0) $result .= self::${'_' . $lang . '_privacy_policy_plus'};
        if (strlen($twitter) > 0) $result .= self::${'_' . $lang . '_privacy_policy_twitter'};
        return $result;
    }
}
