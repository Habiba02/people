<?php

use App\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'WAN routing', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'LAN switching', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'Wifi', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'Datacenter - Nexus', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'Meraki (Wifi, Secure GW, switching)', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'SD WAN - Viptela', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'SD WAN - Meraki', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'DNA-Center / SDA', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'Cisco Prime', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'SDN NFV - uCPE', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'WAN routing', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'LAN switching', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'SD WAN Juniper ', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'SDN NFV - uCPE', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Riverbed', 'skill' => 'SD WAN SteelConnect ', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Infovista', 'skill' => 'SD WAN Ipanema Boost', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelHead EAM Riverbed', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelHead Mobile', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelHead SaaS', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'Cloud SteelHead', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral NetProfiler + FlowGateway', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral AppResponse / NetShark', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral AppInternals', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral NetIM', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral NetPlanner', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral Aternity', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelCentral UCExpert', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'SteelFusion', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'Transaction Analyser - ACN Consulting', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Infovista', 'skill' => 'InfoVista 5View', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Cisco', 'skill' => 'Cisco WAAS optimization', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Juniper', 'skill' => 'Juniper WX optimization', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Dynatrace', 'skill' => 'Dynatrace DC RUM', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Dynatrace', 'skill' => 'Dynatrace AppMon', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'AppNeta - NetResolve', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'Nexthink', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'Witbe', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'IR Prognosis UC ', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'Raspberry Pi', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'Wireshark troubleshooting', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Misc Technologies', 'skill' => 'Other', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'Juniper Firewall', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'Fortinet Firewall', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'PaloAlto DC Firewall', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'Algosec Firewall review', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'Calypso Vulnrability Management', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'CyberArk Management', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'Symantic CASB', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'Checkpoint MTP', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'BlueCoat Cache Management', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'BlueCoat AV', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Secure Gateway', 'technology' => 'Firewalls Proxies Mobile Protection', 'skill' => 'McAfee Active Prevention', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security Integration Services', 'technology' => 'Cisco', 'skill' => 'Cisco ASA Firewall', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security Integration Services', 'technology' => 'Cisco', 'skill' => 'Cisco Ironport', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security Integration Services', 'technology' => 'Cisco', 'skill' => 'Cisco ISE', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Web Protection Suite ', 'technology' => 'Zscaler', 'skill' => 'Zscaler Proxy', 'certification' => 0]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Flexible SSL', 'technology' => 'Pulse Secure', 'skill' => 'Pulse Secure', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/BTG/B2GaaS', 'technology' => 'Cisco', 'skill' => 'IPT (IP Telephony)', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/BTG/B2GaaS', 'technology' => 'Cisco', 'skill' => 'IPCC (IP Contact Center)', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/BTG/B2GaaS', 'technology' => 'Cisco', 'skill' => 'Spark', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Microsoft/ Sonus', 'skill' => 'S4B IPT', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Microsoft/ Sonus', 'skill' => 'S4B DC Architecture', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Microsoft/ Sonus', 'skill' => 'MS Lync Server 2013', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Microsoft/ Sonus', 'skill' => 'MS Teams', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Microsoft/ Sonus', 'skill' => 'Sonus Gateway', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Avaya', 'skill' => 'IPT (IP Telephony)', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Unified Collaboration suite/ B2G/B2GaaS', 'technology' => 'Avaya', 'skill' => 'IPCC (IP Contact Center)', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Open Videopresence', 'technology' => 'Cisco & Polycom', 'skill' => 'Cisco Telepresence', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Open Videopresence', 'technology' => 'Cisco & Polycom', 'skill' => 'Cisco Video Network Specialist', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Open Videopresence', 'technology' => 'Cisco & Polycom', 'skill' => 'Cisco Video Representative', 'certification' => 0]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'Open Videopresence', 'technology' => 'Cisco & Polycom', 'skill' => 'Plycom Video solutions', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'Incident Management', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'Change Management', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'Problem Management', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'ITIL', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'CIC2.0', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'MSS', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'SIAM', 'certification' => 0]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'MS IT services Service Now, Solarwind ITSM', 'skill' => 'Microsoft Azure', 'certification' => 0]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCNA', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCDA', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCNP', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCDP', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCIE SP', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCIE DC', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'CCIE R&S', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => '(NPDESI) Cisco Network Programmability Design and Implementation Specialist', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Cisco', 'skill' => 'Viptela ', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'JNCIA - Junos', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'JNCIS Service provider', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Networking', 'technology' => 'Juniper', 'skill' => 'JNCIE Service provider', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSA-W', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSP-W', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSA-HCB', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSP-HCB', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSA-NPM', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSP-NPM', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSA-APM', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Riverbed', 'skill' => 'RCSP-APM', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'InfoVista', 'skill' => 'ICOS (Ipanema Certified Operational Support)', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'InfoVista', 'skill' => 'ICAS (Ipanema certified advanced support) - Course only', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Cisco', 'skill' => 'WA-ASSE', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Juniper', 'skill' => 'JNCIA-WX', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Dynatrace', 'skill' => 'COMPUWARE DCRUM ENGINEER FUNDAMENTALS ', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Dynatrace', 'skill' => 'APM associate', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Dynatrace', 'skill' => 'APM DC RUM 12.3 Associate - Dynatrace', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'AppNeta', 'skill' => 'AppNeta', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Nexthink', 'skill' => 'Nexthink', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Witbe', 'skill' => 'Witbe', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'IR Prognosis', 'skill' => 'IR Prognosis', 'certification' => 1]);
        Skill::create(['domain' => 'Connectivity', 'subdomain' => 'Application Performance Management', 'technology' => 'Raspberry Pi', 'skill' => 'Raspberry Pi', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Cisco', 'skill' => 'CCNA security', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Cisco', 'skill' => 'CCNP security', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Cisco', 'skill' => 'CCIE security', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Zscaler', 'skill' => 'ZCCA', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Zscaler', 'skill' => 'ZCCP', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Zscaler', 'skill' => 'ZCSP', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Zscaler', 'skill' => 'ZCDS', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Palo Alto', 'skill' => 'Accredited Configuration Engineer (ACE)', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Palo Alto', 'skill' => 'Palo Alto Networks Certified Network Security Engineer (PCNSE)', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Bluecoat', 'skill' => 'BCCPA - Bluecoat Certified Proxy Administrator', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Bluecoat', 'skill' => 'BCCPP - Bluecoat Certified Proxy Professional ', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Fortinet', 'skill' => 'NSE 1 :Network Security Technology Foundations', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Fortinet', 'skill' => 'NSE 2 :Network Security Solutions', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Fortinet', 'skill' => 'NSE 3 : Advanced Network Security Solutions Design', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Fortinet', 'skill' => 'NSE 4 : Fortigate I & II', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'Fortinet', 'skill' => 'NSE 5 : FortiManager & FortiAnalyzer', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'ISO', 'skill' => '27001', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'ISC2', 'skill' => 'Certified Information Systems Security Professional ', 'certification' => 1]);
        Skill::create(['domain' => 'Security', 'subdomain' => 'Security', 'technology' => 'ISACA', 'skill' => 'Certified Information Security Manager (CISM)', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Cisco', 'skill' => 'CCNA Voice', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Cisco', 'skill' => 'CCNP Voice', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Cisco', 'skill' => 'CCNP Collaboration', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Cisco', 'skill' => 'CCIE Collaboration', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Microsoft(Lync/Skype For Business /Teams)', 'skill' => 'MCSE', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Microsoft(Lync/Skype For Business /Teams)', 'skill' => 'Core Solutions of Microsoft Skype for Business 2015', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Microsoft(Lync/Skype For Business /Teams)', 'skill' => 'Deploying Enterprise Voice with Skype for Business 2015', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Microsoft(Lync/Skype For Business /Teams)', 'skill' => 'Enabling Office 365 Services', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Microsoft(Lync/Skype For Business /Teams)', 'skill' => 'Core Solutions of Microsoft Lync Server 2013', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Microsoft(Lync/Skype For Business /Teams)', 'skill' => 'Enterprise Voice & Online Services with Microsoft Lync Server 2013', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Avaya Aura', 'skill' => 'ACA  (Avaya Certified Associate)', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Avaya Aura', 'skill' => 'ACIS (Avaya Certified Implementation Specialist)', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Avaya Aura', 'skill' => 'APDS (Avaya Professional Design Specialist)', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Avaya Aura', 'skill' => 'ACE    (Avaya Certified Expert)', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Sonus', 'skill' => 'Sonus Accredited Technical Professional (SATP)', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Plazza', 'skill' => 'Plazza', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'Polycom', 'skill' => 'Polycom', 'certification' => 1]);
        Skill::create(['domain' => 'UC', 'subdomain' => 'UC', 'technology' => 'AudioCodes', 'skill' => 'AudioCodes', 'certification' => 1]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'ITIL', 'skill' => 'ITIL Foundation Level', 'certification' => 1]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'ITIL', 'skill' => 'ITIL Intermediate Lifecycle Service Stategy', 'certification' => 1]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'ITIL', 'skill' => 'ITIL v3', 'certification' => 1]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'Service Now', 'skill' => 'Service Now', 'certification' => 1]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'Solarwinds Orion', 'skill' => 'Solarwinds Orion', 'certification' => 1]);
        Skill::create(['domain' => 'Service Management', 'subdomain' => 'MSI ITSM', 'technology' => 'SIAM implementation', 'skill' => 'SIAM implementation', 'certification' => 1]);
    }
}
