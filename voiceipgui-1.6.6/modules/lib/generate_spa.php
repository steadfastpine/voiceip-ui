<?php 
$gen_path="/var/lib/voiceip/output/spa/";
mysql_connect("localhost", "$dbuser", "$dbpassword") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
// phone file header
$result_extension = mysql_query("select macaddress, ipaddress, setting_spa from extension WHERE phone_type='spa' and not macaddress='' and line='1'") 
or die(mysql_error()); 
while($row_extension = mysql_fetch_array( $result_extension )) {
$macaddress=strtoupper($row_extension['macaddress']);
$ipaddress=$row_extension['ipaddress'];
$setting_spa=$row_extension['setting_spa'];
$spa_file = $gen_path."spa".$macaddress.".cfg";
$fh = fopen($spa_file, 'w')or die("can't open file");
echo "spa".$macaddress.".cfg<br />";
$spa_file_header="<flat-profile>
<DHCP group=\"Info/System_Information\">Static IP</DHCP>
<Current_IP group=\"Info/System_Information\"></Current_IP>
<Host_Name group=\"Info/System_Information\">SipuraSPA</Host_Name>
<Domain group=\"Info/System_Information\"/>
<Current_Netmask group=\"Info/System_Information\">255.255.255.0</Current_Netmask>
<Current_Gateway group=\"Info/System_Information\">192.168.1.1</Current_Gateway>
<Primary__DNS group=\"Info/System_Information\">4.2.2.1</Primary__DNS>
<Secondary__DNS group=\"Info/System_Information\"/>
<Product_Name group=\"Info/Product_Information\"></Product_Name>
<Serial_Number group=\"Info/Product_Information\"></Serial_Number>
<Software_Version group=\"Info/Product_Information\">5.1.15(aSC)</Software_Version>
<Hardware_Version group=\"Info/Product_Information\">1.0.5(0617)</Hardware_Version>
<MAC_Address group=\"Info/Product_Information\">$macaddress</MAC_Address>
<Client_Certificate group=\"Info/Product_Information\">Installed</Client_Certificate>
<Customization group=\"Info/Product_Information\">Open</Customization>
<Licenses group=\"Info/Product_Information\">None</Licenses>
<Current_Time group=\"Info/Phone_Status\">1/1/2003 12:04:33</Current_Time>
<Elapsed_Time group=\"Info/Phone_Status\">00:04:33</Elapsed_Time>
<Broadcast_Pkts_Sent group=\"Info/Phone_Status\">0</Broadcast_Pkts_Sent>
<Broadcast_Bytes_Sent group=\"Info/Phone_Status\">0</Broadcast_Bytes_Sent>
<Broadcast_Pkts_Recv group=\"Info/Phone_Status\">322</Broadcast_Pkts_Recv>
<Broadcast_Bytes_Recv group=\"Info/Phone_Status\">69869</Broadcast_Bytes_Recv>
<Broadcast_Pkts_Dropped group=\"Info/Phone_Status\">0</Broadcast_Pkts_Dropped>
<Broadcast_Bytes_Dropped group=\"Info/Phone_Status\">0</Broadcast_Bytes_Dropped>
<RTP_Packets_Sent group=\"Info/Phone_Status\">0</RTP_Packets_Sent>
<RTP_Bytes_Sent group=\"Info/Phone_Status\">0</RTP_Bytes_Sent>
<RTP_Packets_Recv group=\"Info/Phone_Status\">0</RTP_Packets_Recv>
<RTP_Bytes_Recv group=\"Info/Phone_Status\">0</RTP_Bytes_Recv>
<SIP_Messages_Sent group=\"Info/Phone_Status\">84</SIP_Messages_Sent>
<SIP_Bytes_Sent group=\"Info/Phone_Status\">40649</SIP_Bytes_Sent>
<SIP_Messages_Recv group=\"Info/Phone_Status\">0</SIP_Messages_Recv>
<SIP_Bytes_Recv group=\"Info/Phone_Status\">0</SIP_Bytes_Recv>
<External_IP group=\"Info/Phone_Status\"/>
<Operational_VLAN_ID group=\"Info/Phone_Status\">n/a</Operational_VLAN_ID>
<Registration_State group=\"Info/Ext_1_Status\">Failed</Registration_State>
<Last_Registration_At group=\"Info/Ext_1_Status\">0/0/0 00:00:00</Last_Registration_At>
<Next_Registration_In group=\"Info/Ext_1_Status\">2 s</Next_Registration_In>
<Message_Waiting group=\"Info/Ext_1_Status\">No</Message_Waiting>
<Mapped_SIP_Port group=\"Info/Ext_1_Status\"/>
<Registration_State group=\"Info/Ext_2_Status\">Failed</Registration_State>
<Last_Registration_At group=\"Info/Ext_2_Status\">0/0/0 00:00:00</Last_Registration_At>
<Next_Registration_In group=\"Info/Ext_2_Status\">2 s</Next_Registration_In>
<Message_Waiting group=\"Info/Ext_2_Status\">No</Message_Waiting>
<Mapped_SIP_Port group=\"Info/Ext_2_Status\"/>
<Registration_State group=\"Info/Ext_3_Status\">Not Registered</Registration_State>
<Last_Registration_At group=\"Info/Ext_3_Status\"/>
<Next_Registration_In group=\"Info/Ext_3_Status\"/>
<Message_Waiting group=\"Info/Ext_3_Status\">No</Message_Waiting>
<Mapped_SIP_Port group=\"Info/Ext_3_Status\"/>
<Registration_State group=\"Info/Ext_4_Status\">Not Registered</Registration_State>
<Last_Registration_At group=\"Info/Ext_4_Status\"/>
<Next_Registration_In group=\"Info/Ext_4_Status\"/>
<Message_Waiting group=\"Info/Ext_4_Status\">No</Message_Waiting>
<Mapped_SIP_Port group=\"Info/Ext_4_Status\"/>
<Registration_State group=\"Info/Ext_5_Status\">Not Registered</Registration_State>
<Last_Registration_At group=\"Info/Ext_5_Status\"/>
<Next_Registration_In group=\"Info/Ext_5_Status\"/>
<Message_Waiting group=\"Info/Ext_5_Status\">No</Message_Waiting>
<Mapped_SIP_Port group=\"Info/Ext_5_Status\"/>
<Registration_State group=\"Info/Ext_6_Status\">Not Registered</Registration_State>
<Last_Registration_At group=\"Info/Ext_6_Status\"/>
<Next_Registration_In group=\"Info/Ext_6_Status\"/>
<Message_Waiting group=\"Info/Ext_6_Status\">No</Message_Waiting>
<Mapped_SIP_Port group=\"Info/Ext_6_Status\"/>
<Call_State group=\"Info/Line_1_Call_1_Status\">No Service</Call_State>
<Tone group=\"Info/Line_1_Call_1_Status\">None</Tone>
<Encoder group=\"Info/Line_1_Call_1_Status\"/>
<Decoder group=\"Info/Line_1_Call_1_Status\"/>
<Type group=\"Info/Line_1_Call_1_Status\"/>
<Remote_Hold group=\"Info/Line_1_Call_1_Status\"/>
<Callback group=\"Info/Line_1_Call_1_Status\"/>
<Peer_Name group=\"Info/Line_1_Call_1_Status\"/>
<Peer_Phone group=\"Info/Line_1_Call_1_Status\"/>
<Duration group=\"Info/Line_1_Call_1_Status\"/>
<Packets_Sent group=\"Info/Line_1_Call_1_Status\"/>
<Packets_Recv group=\"Info/Line_1_Call_1_Status\"/>
<Bytes_Sent group=\"Info/Line_1_Call_1_Status\"/>
<Bytes_Recv group=\"Info/Line_1_Call_1_Status\"/>
<Decode_Latency group=\"Info/Line_1_Call_1_Status\"/>
<Jitter group=\"Info/Line_1_Call_1_Status\"/>
<Round_Trip_Delay group=\"Info/Line_1_Call_1_Status\"/>
<Packets_Lost group=\"Info/Line_1_Call_1_Status\"/>
<Packet_Error group=\"Info/Line_1_Call_1_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_1_Call_1_Status\"/>
<Media_Loopback group=\"Info/Line_1_Call_1_Status\"/>
<Call_State group=\"Info/Line_1_Call_2_Status\">No Service</Call_State>
<Tone group=\"Info/Line_1_Call_2_Status\">None</Tone>
<Encoder group=\"Info/Line_1_Call_2_Status\"/>
<Decoder group=\"Info/Line_1_Call_2_Status\"/>
<Type group=\"Info/Line_1_Call_2_Status\"/>
<Remote_Hold group=\"Info/Line_1_Call_2_Status\"/>
<Callback group=\"Info/Line_1_Call_2_Status\"/>
<Peer_Name group=\"Info/Line_1_Call_2_Status\"/>
<Peer_Phone group=\"Info/Line_1_Call_2_Status\"/>
<Duration group=\"Info/Line_1_Call_2_Status\"/>
<Packets_Sent group=\"Info/Line_1_Call_2_Status\"/>
<Packets_Recv group=\"Info/Line_1_Call_2_Status\"/>
<Bytes_Sent group=\"Info/Line_1_Call_2_Status\"/>
<Bytes_Recv group=\"Info/Line_1_Call_2_Status\"/>
<Decode_Latency group=\"Info/Line_1_Call_2_Status\"/>
<Jitter group=\"Info/Line_1_Call_2_Status\"/>
<Round_Trip_Delay group=\"Info/Line_1_Call_2_Status\"/>
<Packets_Lost group=\"Info/Line_1_Call_2_Status\"/>
<Packet_Error group=\"Info/Line_1_Call_2_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_1_Call_2_Status\"/>
<Media_Loopback group=\"Info/Line_1_Call_2_Status\"/>
<Call_State group=\"Info/Line_2_Call_1_Status\">No Service</Call_State>
<Tone group=\"Info/Line_2_Call_1_Status\">None</Tone>
<Encoder group=\"Info/Line_2_Call_1_Status\"/>
<Decoder group=\"Info/Line_2_Call_1_Status\"/>
<Type group=\"Info/Line_2_Call_1_Status\"/>
<Remote_Hold group=\"Info/Line_2_Call_1_Status\"/>
<Callback group=\"Info/Line_2_Call_1_Status\"/>
<Peer_Name group=\"Info/Line_2_Call_1_Status\"/>
<Peer_Phone group=\"Info/Line_2_Call_1_Status\"/>
<Duration group=\"Info/Line_2_Call_1_Status\"/>
<Packets_Sent group=\"Info/Line_2_Call_1_Status\"/>
<Packets_Recv group=\"Info/Line_2_Call_1_Status\"/>
<Bytes_Sent group=\"Info/Line_2_Call_1_Status\"/>
<Bytes_Recv group=\"Info/Line_2_Call_1_Status\"/>
<Decode_Latency group=\"Info/Line_2_Call_1_Status\"/>
<Jitter group=\"Info/Line_2_Call_1_Status\"/>
<Round_Trip_Delay group=\"Info/Line_2_Call_1_Status\"/>
<Packets_Lost group=\"Info/Line_2_Call_1_Status\"/>
<Packet_Error group=\"Info/Line_2_Call_1_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_2_Call_1_Status\"/>
<Media_Loopback group=\"Info/Line_2_Call_1_Status\"/>
<Call_State group=\"Info/Line_2_Call_2_Status\">No Service</Call_State>
<Tone group=\"Info/Line_2_Call_2_Status\">None</Tone>
<Encoder group=\"Info/Line_2_Call_2_Status\"/>
<Decoder group=\"Info/Line_2_Call_2_Status\"/>
<Type group=\"Info/Line_2_Call_2_Status\"/>
<Remote_Hold group=\"Info/Line_2_Call_2_Status\"/>
<Callback group=\"Info/Line_2_Call_2_Status\"/>
<Peer_Name group=\"Info/Line_2_Call_2_Status\"/>
<Peer_Phone group=\"Info/Line_2_Call_2_Status\"/>
<Duration group=\"Info/Line_2_Call_2_Status\"/>
<Packets_Sent group=\"Info/Line_2_Call_2_Status\"/>
<Packets_Recv group=\"Info/Line_2_Call_2_Status\"/>
<Bytes_Sent group=\"Info/Line_2_Call_2_Status\"/>
<Bytes_Recv group=\"Info/Line_2_Call_2_Status\"/>
<Decode_Latency group=\"Info/Line_2_Call_2_Status\"/>
<Jitter group=\"Info/Line_2_Call_2_Status\"/>
<Round_Trip_Delay group=\"Info/Line_2_Call_2_Status\"/>
<Packets_Lost group=\"Info/Line_2_Call_2_Status\"/>
<Packet_Error group=\"Info/Line_2_Call_2_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_2_Call_2_Status\"/>
<Media_Loopback group=\"Info/Line_2_Call_2_Status\"/>
<Call_State group=\"Info/Line_3_Call_1_Status\">No Service</Call_State>
<Tone group=\"Info/Line_3_Call_1_Status\">None</Tone>
<Encoder group=\"Info/Line_3_Call_1_Status\"/>
<Decoder group=\"Info/Line_3_Call_1_Status\"/>
<Type group=\"Info/Line_3_Call_1_Status\"/>
<Remote_Hold group=\"Info/Line_3_Call_1_Status\"/>
<Callback group=\"Info/Line_3_Call_1_Status\"/>
<Peer_Name group=\"Info/Line_3_Call_1_Status\"/>
<Peer_Phone group=\"Info/Line_3_Call_1_Status\"/>
<Duration group=\"Info/Line_3_Call_1_Status\"/>
<Packets_Sent group=\"Info/Line_3_Call_1_Status\"/>
<Packets_Recv group=\"Info/Line_3_Call_1_Status\"/>
<Bytes_Sent group=\"Info/Line_3_Call_1_Status\"/>
<Bytes_Recv group=\"Info/Line_3_Call_1_Status\"/>
<Decode_Latency group=\"Info/Line_3_Call_1_Status\"/>
<Jitter group=\"Info/Line_3_Call_1_Status\"/>
<Round_Trip_Delay group=\"Info/Line_3_Call_1_Status\"/>
<Packets_Lost group=\"Info/Line_3_Call_1_Status\"/>
<Packet_Error group=\"Info/Line_3_Call_1_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_3_Call_1_Status\"/>
<Media_Loopback group=\"Info/Line_3_Call_1_Status\"/>
<Call_State group=\"Info/Line_3_Call_2_Status\">No Service</Call_State>
<Tone group=\"Info/Line_3_Call_2_Status\">None</Tone>
<Encoder group=\"Info/Line_3_Call_2_Status\"/>
<Decoder group=\"Info/Line_3_Call_2_Status\"/>
<Type group=\"Info/Line_3_Call_2_Status\"/>
<Remote_Hold group=\"Info/Line_3_Call_2_Status\"/>
<Callback group=\"Info/Line_3_Call_2_Status\"/>
<Peer_Name group=\"Info/Line_3_Call_2_Status\"/>
<Peer_Phone group=\"Info/Line_3_Call_2_Status\"/>
<Duration group=\"Info/Line_3_Call_2_Status\"/>
<Packets_Sent group=\"Info/Line_3_Call_2_Status\"/>
<Packets_Recv group=\"Info/Line_3_Call_2_Status\"/>
<Bytes_Sent group=\"Info/Line_3_Call_2_Status\"/>
<Bytes_Recv group=\"Info/Line_3_Call_2_Status\"/>
<Decode_Latency group=\"Info/Line_3_Call_2_Status\"/>
<Jitter group=\"Info/Line_3_Call_2_Status\"/>
<Round_Trip_Delay group=\"Info/Line_3_Call_2_Status\"/>
<Packets_Lost group=\"Info/Line_3_Call_2_Status\"/>
<Packet_Error group=\"Info/Line_3_Call_2_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_3_Call_2_Status\"/>
<Media_Loopback group=\"Info/Line_3_Call_2_Status\"/>
<Call_State group=\"Info/Line_4_Call_1_Status\">Disabled</Call_State>
<Tone group=\"Info/Line_4_Call_1_Status\">None</Tone>
<Encoder group=\"Info/Line_4_Call_1_Status\"/>
<Decoder group=\"Info/Line_4_Call_1_Status\"/>
<Type group=\"Info/Line_4_Call_1_Status\"/>
<Remote_Hold group=\"Info/Line_4_Call_1_Status\"/>
<Callback group=\"Info/Line_4_Call_1_Status\"/>
<Peer_Name group=\"Info/Line_4_Call_1_Status\"/>
<Peer_Phone group=\"Info/Line_4_Call_1_Status\"/>
<Duration group=\"Info/Line_4_Call_1_Status\"/>
<Packets_Sent group=\"Info/Line_4_Call_1_Status\"/>
<Packets_Recv group=\"Info/Line_4_Call_1_Status\"/>
<Bytes_Sent group=\"Info/Line_4_Call_1_Status\"/>
<Bytes_Recv group=\"Info/Line_4_Call_1_Status\"/>
<Decode_Latency group=\"Info/Line_4_Call_1_Status\"/>
<Jitter group=\"Info/Line_4_Call_1_Status\"/>
<Round_Trip_Delay group=\"Info/Line_4_Call_1_Status\"/>
<Packets_Lost group=\"Info/Line_4_Call_1_Status\"/>
<Packet_Error group=\"Info/Line_4_Call_1_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_4_Call_1_Status\"/>
<Media_Loopback group=\"Info/Line_4_Call_1_Status\"/>
<Call_State group=\"Info/Line_4_Call_2_Status\">Disabled</Call_State>
<Tone group=\"Info/Line_4_Call_2_Status\">SipuraSPA</Tone>
<Encoder group=\"Info/Line_4_Call_2_Status\"/>
<Decoder group=\"Info/Line_4_Call_2_Status\">192.168.1.238</Decoder>
<Type group=\"Info/Line_4_Call_2_Status\">192.168.1.1</Type>
<Remote_Hold group=\"Info/Line_4_Call_2_Status\">4.2.2.1</Remote_Hold>
<Callback group=\"Info/Line_4_Call_2_Status\"/>
<Peer_Name group=\"Info/Line_4_Call_2_Status\">Static IP</Peer_Name>
<Peer_Phone group=\"Info/Line_4_Call_2_Status\"/>
<Duration group=\"Info/Line_4_Call_2_Status\"/>
<Packets_Sent group=\"Info/Line_4_Call_2_StatusThe file /var/lib/voiceip/output/polycom/0004f54df888.cfg changed on disk.\"/>
<Packets_Recv group=\"Info/Line_4_Call_2_Status\"/>
<Bytes_Sent group=\"Info/Line_4_Call_2_Status\"/>
<Bytes_Recv group=\"Info/Line_4_Call_2_Status\"/>
<Decode_Latency group=\"Info/Line_4_Call_2_Status\"/>
<Jitter group=\"Info/Line_4_Call_2_Status\"/>
<Round_Trip_Delay group=\"Info/Line_4_Call_2_Status\"/>
<Packets_Lost group=\"Info/Line_4_Call_2_Status\"/>
<Packet_Error group=\"Info/Line_4_Call_2_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_4_Call_2_Status\"/>
<Media_Loopback group=\"Info/Line_4_Call_2_Status\"/>
<Call_State group=\"Info/Line_5_Call_1_Status\">Disabled</Call_State>
<Tone group=\"Info/Line_5_Call_1_Status\">None</Tone>
<Encoder group=\"Info/Line_5_Call_1_Status\"/>
<Decoder group=\"Info/Line_5_Call_1_Status\"/>
<Type group=\"Info/Line_5_Call_1_Status\"/>
<Remote_Hold group=\"Info/Line_5_Call_1_Status\"/>
<Callback group=\"Info/Line_5_Call_1_Status\"/>
<Peer_Name group=\"Info/Line_5_Call_1_Status\"/>
<Peer_Phone group=\"Info/Line_5_Call_1_Status\"/>
<Duration group=\"Info/Line_5_Call_1_Status\"/>
<Packets_Sent group=\"Info/Line_5_Call_1_Status\"/>
<Packets_Recv group=\"Info/Line_5_Call_1_Status\"/>
<Bytes_Sent group=\"Info/Line_5_Call_1_Status\"/>
<Bytes_Recv group=\"Info/Line_5_Call_1_Status\"/>
<Decode_Latency group=\"Info/Line_5_Call_1_Status\"/>
<Jitter group=\"Info/Line_5_Call_1_Status\"/>
<Round_Trip_Delay group=\"Info/Line_5_Call_1_Status\"/>
<Packets_Lost group=\"Info/Line_5_Call_1_Status\"/>
<Packet_Error group=\"Info/Line_5_Call_1_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_5_Call_1_Status\"/>
<Media_Loopback group=\"Info/Line_5_Call_1_Status\"/>
<Call_State group=\"Info/Line_5_Call_2_Status\">Disabled</Call_State>
<Tone group=\"Info/Line_5_Call_2_Status\">None</Tone>
<Encoder group=\"Info/Line_5_Call_2_Status\"/>
<Decoder group=\"Info/Line_5_Call_2_Status\"/>
<Type group=\"Info/Line_5_Call_2_Status\"/>
<Remote_Hold group=\"Info/Line_5_Call_2_Status\"/>
<Callback group=\"Info/Line_5_Call_2_Status\"/>
<Peer_Name group=\"Info/Line_5_Call_2_Status\"/>
<Peer_Phone group=\"Info/Line_5_Call_2_Status\"/>
<Duration group=\"Info/Line_5_Call_2_Status\"/>
<Packets_Sent group=\"Info/Line_5_Call_2_Status\"/>
<Packets_Recv group=\"Info/Line_5_Call_2_Status\"/>
<Bytes_Sent group=\"Info/Line_5_Call_2_Status\"/>
<Bytes_Recv group=\"Info/Line_5_Call_2_Status\"/>
<Decode_Latency group=\"Info/Line_5_Call_2_Status\"/>
<Jitter group=\"Info/Line_5_Call_2_Status\"/>
<Round_Trip_Delay group=\"Info/Line_5_Call_2_Status\"/>
<Packets_Lost group=\"Info/Line_5_Call_2_Status\"/>
<Packet_Error group=\"Info/Line_5_Call_2_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_5_Call_2_Status\"/>
<Media_Loopback group=\"Info/Line_5_Call_2_Status\"/>
<Call_State group=\"Info/Line_6_Call_1_Status\">Disabled</Call_State>
<Tone group=\"Info/Line_6_Call_1_Status\">None</Tone>
<Encoder group=\"Info/Line_6_Call_1_Status\"/>
<Decoder group=\"Info/Line_6_Call_1_Status\"/>
<Type group=\"Info/Line_6_Call_1_Status\"/>
<Remote_Hold group=\"Info/Line_6_Call_1_Status\"/>
<Callback group=\"Info/Line_6_Call_1_Status\"/>
<Peer_Name group=\"Info/Line_6_Call_1_Status\"/>
<Peer_Phone group=\"Info/Line_6_Call_1_Status\"/>
<Duration group=\"Info/Line_6_Call_1_Status\"/>
<Packets_Sent group=\"Info/Line_6_Call_1_Status\"/>
<Packets_Recv group=\"Info/Line_6_Call_1_Status\"/>
<Bytes_Sent group=\"Info/Line_6_Call_1_Status\"/>
<Bytes_Recv group=\"Info/Line_6_Call_1_Status\"/>
<Decode_Latency group=\"Info/Line_6_Call_1_Status\"/>
<Jitter group=\"Info/Line_6_Call_1_Status\"/>
<Round_Trip_Delay group=\"Info/Line_6_Call_1_Status\"/>
<Packets_Lost group=\"Info/Line_6_Call_1_Status\"/>
<Packet_Error group=\"Info/Line_6_Call_1_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_6_Call_1_Status\"/>
<Media_Loopback group=\"Info/Line_6_Call_1_Status\"/>
<Call_State group=\"Info/Line_6_Call_2_Status\">Disabled</Call_State>
<Tone group=\"Info/Line_6_Call_2_Status\">None</Tone>
<Encoder group=\"Info/Line_6_Call_2_Status\"/>
<Decoder group=\"Info/Line_6_Call_2_Status\"/>
<Type group=\"Info/Line_6_Call_2_Status\"/>
<Remote_Hold group=\"Info/Line_6_Call_2_Status\"/>
<Callback group=\"Info/Line_6_Call_2_Status\"/>
<Peer_Name group=\"Info/Line_6_Call_2_Status\"/>
<Peer_Phone group=\"Info/Line_6_Call_2_Status\"/>
<Duration group=\"Info/Line_6_Call_2_Status\"/>
<Packets_Sent group=\"Info/Line_6_Call_2_Status\"/>
<Packets_Recv group=\"Info/Line_6_Call_2_Status\"/>
<Bytes_Sent group=\"Info/Line_6_Call_2_Status\"/>
<Bytes_Recv group=\"Info/Line_6_Call_2_Status\"/>
<Decode_Latency group=\"Info/Line_6_Call_2_Status\"/>
<Jitter group=\"Info/Line_6_Call_2_Status\"/>
<Round_Trip_Delay group=\"Info/Line_6_Call_2_Status\"/>
<Packets_Lost group=\"Info/Line_6_Call_2_Status\"/>
<Packet_Error group=\"Info/Line_6_Call_2_Status\"/>
<Mapped_RTP_Port group=\"Info/Line_6_Call_2_Status\"/>
<Media_Loopback group=\"Info/Line_6_Call_2_Status\"/>
<Status group=\"Info/Downloaded_Ring_Tone\">Idle</Status>
<Ring_Tone_1 group=\"Info/Downloaded_Ring_Tone\">Not Installed</Ring_Tone_1>
<Ring_Tone_2 group=\"Info/Downloaded_Ring_Tone\">Not Installed</Ring_Tone_2>
<Restricted_Access_Domains group=\"System/System_Configuration\"/>
<Enable_Web_Server group=\"System/System_Configuration\">Yes</Enable_Web_Server>
<Web_Server_Port group=\"System/System_Configuration\">80</Web_Server_Port>
<Enable_Web_Admin_Access group=\"System/System_Configuration\">Yes</Enable_Web_Admin_Access>
<Admin_Passwd group=\"System/System_Configuration\"/>
<User_Password group=\"System/System_Configuration\"/>
<Connection_Type group=\"System/Internet_Connection_Type_\">Static IP</Connection_Type>
<Static_IP group=\"System/_Static_IP_Settings\">$ipaddress</Static_IP>
<NetMask group=\"System/_Static_IP_Settings\"></NetMask>
<Gateway group=\"System/_Static_IP_Settings\"></Gateway>
<PPPoE_Login_Name group=\"System/_PPPoE_Settings\"/>
<PPPoE_Login_Password group=\"System/_PPPoE_Settings\"/>
<PPPoE_Service_Name group=\"System/_PPPoE_Settings\"/>
<HostName group=\"System/Optional_Network_Configuration\"/>
<Domain group=\"System/Optional_Network_Configuration\"/>
<Primary_DNS group=\"System/Optional_Network_Configuration\">4.2.2.1</Primary_DNS>
<Secondary_DNS group=\"System/Optional_Network_Configuration\"/>
<DNS_Server_Order group=\"System/Optional_Network_Configuration\">Manual</DNS_Server_Order>
<DNS_Query_Mode group=\"System/Optional_Network_Configuration\">Parallel</DNS_Query_Mode>
<Syslog_Server group=\"System/Optional_Network_Configuration\"/>
<Debug_Server group=\"System/Optional_Network_Configuration\"/>
<Debug_Level group=\"System/Optional_Network_Configuration\">0</Debug_Level>
<Primary_NTP_Server group=\"System/Optional_Network_Configuration\"/>
<Secondary_NTP_Server group=\"System/Optional_Network_Configuration\"/>
<Enable_VLAN group=\"System/VLAN_Settings\">No</Enable_VLAN>
<VLAN_ID group=\"System/VLAN_Settings\">1</VLAN_ID>
<Enable_CDP group=\"System/VLAN_Settings\">Yes</Enable_CDP>
<Max_Forward group=\"SIP/SIP_Parameters\">70</Max_Forward>
<Max_Redirection group=\"SIP/SIP_Parameters\">5</Max_Redirection>
<Max_Auth group=\"SIP/SIP_Parameters\">2</Max_Auth>
<SIP_User_Agent_Name group=\"SIP/SIP_Parameters\">\$VERSION</SIP_User_Agent_Name>
<SIP_Server_Name group=\"SIP/SIP_Parameters\">\$VERSION</SIP_Server_Name>
<SIP_Reg_User_Agent_Name group=\"SIP/SIP_Parameters\"/>
<SIP_Accept_Language group=\"SIP/SIP_Parameters\"/>
<DTMF_Relay_MIME_Type group=\"SIP/SIP_Parameters\">application/dtmf-relay</DTMF_Relay_MIME_Type>
<Remove_Last_Reg group=\"SIP/SIP_Parameters\">No</Remove_Last_Reg>
<Use_Compact_Header group=\"SIP/SIP_Parameters\">No</Use_Compact_Header>
<Escape_Display_Name group=\"SIP/SIP_Parameters\">No</Escape_Display_Name>
<SIP-B_Enable group=\"SIP/SIP_Parameters\">No</SIP-B_Enable>
<Talk_Package group=\"SIP/SIP_Parameters\">No</Talk_Package>
<Hold_Package group=\"SIP/SIP_Parameters\">No</Hold_Package>
<Conference_Package group=\"SIP/SIP_Parameters\">No</Conference_Package>
<Notify_Conference group=\"SIP/SIP_Parameters\">No</Notify_Conference>
<RFC_2543_Call_Hold group=\"SIP/SIP_Parameters\">Yes</RFC_2543_Call_Hold>
<Random_REG_CID_On_Reboot group=\"SIP/SIP_Parameters\">No</Random_REG_CID_On_Reboot>
<SIP_TCP_Port_Min group=\"SIP/SIP_Parameters\">5060</SIP_TCP_Port_Min>
<SIP_TCP_Port_Max group=\"SIP/SIP_Parameters\">5080</SIP_TCP_Port_Max>
<CTI_Enable group=\"SIP/SIP_Parameters\">No</CTI_Enable>
<SIP_T1 group=\"SIP/SIP_Timer_Values__sec_\">.5</SIP_T1>
<SIP_T2 group=\"SIP/SIP_Timer_Values__sec_\">4</SIP_T2>
<SIP_T4 group=\"SIP/SIP_Timer_Values__sec_\">5</SIP_T4>
<SIP_Timer_B group=\"SIP/SIP_Timer_Values__sec_\">16</SIP_Timer_B>
<SIP_Timer_F group=\"SIP/SIP_Timer_Values__sec_\">16</SIP_Timer_F>
<SIP_Timer_H group=\"SIP/SIP_Timer_Values__sec_\">16</SIP_Timer_H>
<SIP_Timer_D group=\"SIP/SIP_Timer_Values__sec_\">16</SIP_Timer_D>
<SIP_Timer_J group=\"SIP/SIP_Timer_Values__sec_\">16</SIP_Timer_J>
<INVITE_Expires group=\"SIP/SIP_Timer_Values__sec_\">240</INVITE_Expires>
<ReINVITE_Expires group=\"SIP/SIP_Timer_Values__sec_\">30</ReINVITE_Expires>
<Reg_Min_Expires group=\"SIP/SIP_Timer_Values__sec_\">1</Reg_Min_Expires>
<Reg_Max_Expires group=\"SIP/SIP_Timer_Values__sec_\">7200</Reg_Max_Expires>
<Reg_Retry_Intvl group=\"SIP/SIP_Timer_Values__sec_\">30</Reg_Retry_Intvl>
<Reg_Retry_Long_Intvl group=\"SIP/SIP_Timer_Values__sec_\">1200</Reg_Retry_Long_Intvl>
<Reg_Retry_Random_Delay group=\"SIP/SIP_Timer_Values__sec_\"/>
<Reg_Retry_Long_Random_Delay group=\"SIP/SIP_Timer_Values__sec_\"/>
<Reg_Retry_Intvl_Cap group=\"SIP/SIP_Timer_Values__sec_\"/>
<Sub_Min_Expires group=\"SIP/SIP_Timer_Values__sec_\">10</Sub_Min_Expires>
<Sub_Max_Expires group=\"SIP/SIP_Timer_Values__sec_\">7200</Sub_Max_Expires>
<Sub_Retry_Intvl group=\"SIP/SIP_Timer_Values__sec_\">10</Sub_Retry_Intvl>
<SIT1_RSC group=\"SIP/Response_Status_Code_Handling\"/>
<SIT2_RSC group=\"SIP/Response_Status_Code_Handling\"/>
<SIT3_RSC group=\"SIP/Response_Status_Code_Handling\"/>
<SIT4_RSC group=\"SIP/Response_Status_Code_Handling\"/>
<Try_Backup_RSC group=\"SIP/Response_Status_Code_Handling\"/>
<Retry_Reg_RSC group=\"SIP/Response_Status_Code_Handling\"/>
<RTP_Port_Min group=\"SIP/RTP_Parameters\">16384</RTP_Port_Min>
<RTP_Port_Max group=\"SIP/RTP_Parameters\">16482</RTP_Port_Max>
<RTP_Packet_Size group=\"SIP/RTP_Parameters\">0.030</RTP_Packet_Size>
<Max_RTP_ICMP_Err group=\"SIP/RTP_Parameters\">0</Max_RTP_ICMP_Err>
<RTCP_Tx_Interval group=\"SIP/RTP_Parameters\">0</RTCP_Tx_Interval>
<No_UDP_Checksum group=\"SIP/RTP_Parameters\">No</No_UDP_Checksum>
<Symmetric_RTP group=\"SIP/RTP_Parameters\">No</Symmetric_RTP>
<Stats_In_BYE group=\"SIP/RTP_Parameters\">No</Stats_In_BYE>
<AVT_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">101</AVT_Dynamic_Payload>
<INFOREQ_Dynamic_Payload group=\"SIP/SDP_Payload_Types\"/>
<G726r16_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">98</G726r16_Dynamic_Payload>
<G726r24_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">97</G726r24_Dynamic_Payload>
<G726r32_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">2</G726r32_Dynamic_Payload>
<G726r40_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">96</G726r40_Dynamic_Payload>
<G729b_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">99</G729b_Dynamic_Payload>
<EncapRTP_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">112</EncapRTP_Dynamic_Payload>
<RTP-Start-Loopback_Dynamic_Payload group=\"SIP/SDP_Payload_Types\">113</RTP-Start-Loopback_Dynamic_Payload>
<RTP-Start-Loopback_Codec group=\"SIP/SDP_Payload_Types\">G711u</RTP-Start-Loopback_Codec>
<AVT_Codec_Name group=\"SIP/SDP_Payload_Types\">telephone-event</AVT_Codec_Name>
<G711u_Codec_Name group=\"SIP/SDP_Payload_Types\">PCMU</G711u_Codec_Name>
<G711a_Codec_Name group=\"SIP/SDP_Payload_Types\">PCMA</G711a_Codec_Name>
<G726r16_Codec_Name group=\"SIP/SDP_Payload_Types\">G726-16</G726r16_Codec_Name>
<G726r24_Codec_Name group=\"SIP/SDP_Payload_Types\">G726-24</G726r24_Codec_Name>
<G726r32_Codec_Name group=\"SIP/SDP_Payload_Types\">G726-32</G726r32_Codec_Name>
<G726r40_Codec_Name group=\"SIP/SDP_Payload_Types\">G726-40</G726r40_Codec_Name>
<G729a_Codec_Name group=\"SIP/SDP_Payload_Types\">G729a</G729a_Codec_Name>
<G729b_Codec_Name group=\"SIP/SDP_Payload_Types\">G729ab</G729b_Codec_Name>
<G723_Codec_Name group=\"SIP/SDP_Payload_Types\">G723</G723_Codec_Name>
<EncapRTP_Codec_Name group=\"SIP/SDP_Payload_Types\">encaprtp</EncapRTP_Codec_Name>
<Handle_VIA_received group=\"SIP/NAT_Support_Parameters\">No</Handle_VIA_received>
<Handle_VIA_rport group=\"SIP/NAT_Support_Parameters\">No</Handle_VIA_rport>
<Insert_VIA_received group=\"SIP/NAT_Support_Parameters\">No</Insert_VIA_received>
<Insert_VIA_rport group=\"SIP/NAT_Support_Parameters\">No</Insert_VIA_rport>
<Substitute_VIA_Addr group=\"SIP/NAT_Support_Parameters\">No</Substitute_VIA_Addr>
<Send_Resp_To_Src_Port group=\"SIP/NAT_Support_Parameters\">No</Send_Resp_To_Src_Port>
<STUN_Enable group=\"SIP/NAT_Support_Parameters\">No</STUN_Enable>
<STUN_Test_Enable group=\"SIP/NAT_Support_Parameters\">No</STUN_Test_Enable>
<STUN_Server group=\"SIP/NAT_Support_Parameters\"/>
<EXT_IP group=\"SIP/NAT_Support_Parameters\"/>
<EXT_RTP_Port_Min group=\"SIP/NAT_Support_Parameters\"/>
<NAT_Keep_Alive_Intvl group=\"SIP/NAT_Support_Parameters\">15</NAT_Keep_Alive_Intvl>
<Linksys_Key_System group=\"SIP/Linksys_Key_System_Parameters\">No</Linksys_Key_System>
<Multicast_Address group=\"SIP/Linksys_Key_System_Parameters\">224.168.168.168:6061</Multicast_Address>
<Force_LAN_Codec group=\"SIP/Linksys_Key_System_Parameters\">none</Force_LAN_Codec>
<Provision_Enable group=\"Provisioning/Configuration_Profile\">Yes</Provision_Enable>
<Resync_On_Reset group=\"Provisioning/Configuration_Profile\">Yes</Resync_On_Reset>
<Resync_Random_Delay group=\"Provisioning/Configuration_Profile\">2</Resync_Random_Delay>
<Resync_Periodic group=\"Provisioning/Configuration_Profile\">3600</Resync_Periodic>
<Resync_Error_Retry_Delay group=\"Provisioning/Configuration_Profile\">3600</Resync_Error_Retry_Delay>
<Forced_Resync_Delay group=\"Provisioning/Configuration_Profile\">14400</Forced_Resync_Delay>
<Resync_From_SIP group=\"Provisioning/Configuration_Profile\">Yes</Resync_From_SIP>
<Resync_After_Upgrade_Attempt group=\"Provisioning/Configuration_Profile\">Yes</Resync_After_Upgrade_Attempt>
<Resync_Trigger_1 group=\"Provisioning/Configuration_Profile\"/>
<Resync_Trigger_2 group=\"Provisioning/Configuration_Profile\"/>
<Resync_Fails_On_FNF group=\"Provisioning/Configuration_Profile\">Yes</Resync_Fails_On_FNF>
<Profile_Rule group=\"Provisioning/Configuration_Profile\">/spa\$PSN.cfg</Profile_Rule>
<Profile_Rule_B group=\"Provisioning/Configuration_Profile\"/>
<Profile_Rule_C group=\"Provisioning/Configuration_Profile\"/>
<Profile_Rule_D group=\"Provisioning/Configuration_Profile\"/>
<Log_Resync_Request_Msg group=\"Provisioning/Configuration_Profile\">\$PN \$MAC -- Requesting resync \$SCHEME://\$SERVIP:\$PORT\$PATH</Log_Resync_Request_Msg>
<Log_Resync_Success_Msg group=\"Provisioning/Configuration_Profile\">\$PN \$MAC -- Successful resync \$SCHEME://\$SERVIP:\$PORT\$PATH</Log_Resync_Success_Msg>
<Log_Resync_Failure_Msg group=\"Provisioning/Configuration_Profile\">\$PN \$MAC -- Resync failed: \$ERR</Log_Resync_Failure_Msg>
<Report_Rule group=\"Provisioning/Configuration_Profile\"/>
<Upgrade_Enable group=\"Provisioning/Firmware_Upgrade\">Yes</Upgrade_Enable>
<Upgrade_Error_Retry_Delay group=\"Provisioning/Firmware_Upgrade\">3600</Upgrade_Error_Retry_Delay>
<Downgrade_Rev_Limit group=\"Provisioning/Firmware_Upgrade\"/>
<Upgrade_Rule group=\"Provisioning/Firmware_Upgrade\"/>
<Log_Upgrade_Request_Msg group=\"Provisioning/Firmware_Upgrade\">\$PN \$MAC -- Requesting upgrade \$SCHEME://\$SERVIP:\$PORT\$PATH</Log_Upgrade_Request_Msg>
<Log_Upgrade_Success_Msg group=\"Provisioning/Firmware_Upgrade\">\$PN \$MAC -- Successful upgrade \$SCHEME://\$SERVIP:\$PORT\$PATH -- \$ERR</Log_Upgrade_Success_Msg>
<Log_Upgrade_Failure_Msg group=\"Provisioning/Firmware_Upgrade\">\$PN \$MAC -- Upgrade failed: \$ERR</Log_Upgrade_Failure_Msg>
<License_Keys group=\"Provisioning/Firmware_Upgrade\"/>
<GPP_A group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_B group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_C group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_D group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_E group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_F group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_G group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_H group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_I group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_J group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_K group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_L group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_M group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_N group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_O group=\"Provisioning/General_Purpose_Parameters\"/>
<GPP_P group=\"Provisioning/General_Purpose_Parameters\"/>
<Dial_Tone group=\"Regional/Call_Progress_Tones\">350@-19,440@-19;10(*/0/1+2)</Dial_Tone>
<Outside_Dial_Tone group=\"Regional/Call_Progress_Tones\">420@-16;10(*/0/1)</Outside_Dial_Tone>
<Prompt_Tone group=\"Regional/Call_Progress_Tones\">520@-19,620@-19;10(*/0/1+2)</Prompt_Tone>
<Busy_Tone group=\"Regional/Call_Progress_Tones\">480@-19,620@-19;10(.5/.5/1+2)</Busy_Tone>
<Reorder_Tone group=\"Regional/Call_Progress_Tones\">480@-19,620@-19;10(.25/.25/1+2)</Reorder_Tone>
<Off_Hook_Warning_Tone group=\"Regional/Call_Progress_Tones\">480@-10,620@0;10(.125/.125/1+2)</Off_Hook_Warning_Tone>
<Ring_Back_Tone group=\"Regional/Call_Progress_Tones\">440@-19,480@-19;*(2/4/1+2)</Ring_Back_Tone>
<Call_Waiting_Tone group=\"Regional/Call_Progress_Tones\">440@-10;30(.3/9.7/1)</Call_Waiting_Tone>
<Confirm_Tone group=\"Regional/Call_Progress_Tones\">600@-16;1(.25/.25/1)</Confirm_Tone>
<SIT1_Tone group=\"Regional/Call_Progress_Tones\">985@-16,1428@-16,1777@-16;20(.380/0/1,.380/0/2,.380/0/3,0/4/0)</SIT1_Tone>
<SIT2_Tone group=\"Regional/Call_Progress_Tones\">914@-16,1371@-16,1777@-16;20(.274/0/1,.274/0/2,.380/0/3,0/4/0)</SIT2_Tone>
<SIT3_Tone group=\"Regional/Call_Progress_Tones\">914@-16,1371@-16,1777@-16;20(.380/0/1,.380/0/2,.380/0/3,0/4/0)</SIT3_Tone>
<SIT4_Tone group=\"Regional/Call_Progress_Tones\">985@-16,1371@-16,1777@-16;20(.380/0/1,.274/0/2,.380/0/3,0/4/0)</SIT4_Tone>
<MWI_Dial_Tone group=\"Regional/Call_Progress_Tones\">350@-19,440@-19;2(.1/.1/1+2);10(*/0/1+2)</MWI_Dial_Tone>
<Cfwd_Dial_Tone group=\"Regional/Call_Progress_Tones\">350@-19,440@-19;2(.2/.2/1+2);10(*/0/1+2)</Cfwd_Dial_Tone>
<Holding_Tone group=\"Regional/Call_Progress_Tones\">600@-19;25(.1/.1/1,.1/.1/1,.1/9.5/1)</Holding_Tone>
<Conference_Tone group=\"Regional/Call_Progress_Tones\">350@-19;20(.1/.1/1,.1/9.7/1)</Conference_Tone>
<Secure_Call_Indication_Tone group=\"Regional/Call_Progress_Tones\">397@-19,507@-19;15(0/2/0,.2/.1/1,.1/2.1/2)</Secure_Call_Indication_Tone>
<Page_Tone group=\"Regional/Call_Progress_Tones\">600@-16;.3(.05/0.05/1)</Page_Tone>
<Alert_Tone group=\"Regional/Call_Progress_Tones\">600@-19;.2(.05/0.05/1)</Alert_Tone>
<Cadence_1 group=\"Regional/Distinctive_Ring_Patterns\">60(2/4)</Cadence_1>
<Cadence_2 group=\"Regional/Distinctive_Ring_Patterns\">60(.3/.2,1/.2,.3/4)</Cadence_2>
<Cadence_3 group=\"Regional/Distinctive_Ring_Patterns\">60(.8/.4,.8/4)</Cadence_3>
<Cadence_4 group=\"Regional/Distinctive_Ring_Patterns\">60(.4/.2,.3/.2,.8/4)</Cadence_4>
<Cadence_5 group=\"Regional/Distinctive_Ring_Patterns\">60(.2/.2,.2/.2,.2/.2,1/4)</Cadence_5>
<Cadence_6 group=\"Regional/Distinctive_Ring_Patterns\">60(.2/.4,.2/.4,.2/4)</Cadence_6>
<Cadence_7 group=\"Regional/Distinctive_Ring_Patterns\">60(4.5/4)</Cadence_7>
<Cadence_8 group=\"Regional/Distinctive_Ring_Patterns\">60(0.25/9.75)</Cadence_8>
<Cadence_9 group=\"Regional/Distinctive_Ring_Patterns\">60(.4/.2,.4/2)</Cadence_9>
<Reorder_Delay group=\"Regional/Control_Timer_Values__sec_\">5</Reorder_Delay>
<Call_Back_Expires group=\"Regional/Control_Timer_Values__sec_\">1800</Call_Back_Expires>
<Call_Back_Retry_Intvl group=\"Regional/Control_Timer_Values__sec_\">30</Call_Back_Retry_Intvl>
<Call_Back_Delay group=\"Regional/Control_Timer_Values__sec_\">.5</Call_Back_Delay>
<Interdigit_Long_Timer group=\"Regional/Control_Timer_Values__sec_\">10</Interdigit_Long_Timer>
<Interdigit_Short_Timer group=\"Regional/Control_Timer_Values__sec_\">3</Interdigit_Short_Timer>
<Call_Return_Code group=\"Regional/Vertical_Service_Activation_Codes\">*69</Call_Return_Code>
<Blind_Transfer_Code group=\"Regional/Vertical_Service_Activation_Codes\">*98</Blind_Transfer_Code>
<Call_Back_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*66</Call_Back_Act_Code>
<Call_Back_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*86</Call_Back_Deact_Code>
<Cfwd_All_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*72</Cfwd_All_Act_Code>
<Cfwd_All_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*73</Cfwd_All_Deact_Code>
<Cfwd_Busy_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*90</Cfwd_Busy_Act_Code>
<Cfwd_Busy_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*91</Cfwd_Busy_Deact_Code>
<Cfwd_No_Ans_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*92</Cfwd_No_Ans_Act_Code>
<Cfwd_No_Ans_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*93</Cfwd_No_Ans_Deact_Code>
<CW_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*56</CW_Act_Code>
<CW_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*57</CW_Deact_Code>
<CW_Per_Call_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*71</CW_Per_Call_Act_Code>
<CW_Per_Call_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*70</CW_Per_Call_Deact_Code>
<Block_CID_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*67</Block_CID_Act_Code>
<Block_CID_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*68</Block_CID_Deact_Code>
<Block_CID_Per_Call_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*81</Block_CID_Per_Call_Act_Code>
<Block_CID_Per_Call_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*82</Block_CID_Per_Call_Deact_Code>
<Block_ANC_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*77</Block_ANC_Act_Code>
<Block_ANC_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*87</Block_ANC_Deact_Code>
<DND_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*78</DND_Act_Code>
<DND_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*79</DND_Deact_Code>
<Secure_All_Call_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*16</Secure_All_Call_Act_Code>
<Secure_No_Call_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*17</Secure_No_Call_Act_Code>
<Secure_One_Call_Act_Code group=\"Regional/Vertical_Service_Activation_Codes\">*18</Secure_One_Call_Act_Code>
<Secure_One_Call_Deact_Code group=\"Regional/Vertical_Service_Activation_Codes\">*19</Secure_One_Call_Deact_Code>
<Paging_Code group=\"Regional/Vertical_Service_Activation_Codes\">*96</Paging_Code>
<Call_Park_Code group=\"Regional/Vertical_Service_Activation_Codes\">*38</Call_Park_Code>
<Call_Pickup_Code group=\"Regional/Vertical_Service_Activation_Codes\">*36</Call_Pickup_Code>
<Call_UnPark_Code group=\"Regional/Vertical_Service_Activation_Codes\">*39</Call_UnPark_Code>
<Group_Call_Pickup_Code group=\"Regional/Vertical_Service_Activation_Codes\">*37</Group_Call_Pickup_Code>
<Media_Loopback_Code group=\"Regional/Vertical_Service_Activation_Codes\">*03</Media_Loopback_Code>
<Referral_Services_Codes group=\"Regional/Vertical_Service_Activation_Codes\"/>
<Feature_Dial_Services_Codes group=\"Regional/Vertical_Service_Activation_Codes\"/>
<Service_Annc_Base_Number group=\"Regional/Vertical_Service_Announcement_Codes\"/>
<Service_Annc_Extension_Codes group=\"Regional/Vertical_Service_Announcement_Codes\"/>
<Prefer_G711u_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*017110</Prefer_G711u_Code>
<Force_G711u_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*027110</Force_G711u_Code>
<Prefer_G711a_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*017111</Prefer_G711a_Code>
<Force_G711a_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*027111</Force_G711a_Code>
<Prefer_G723_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*01723</Prefer_G723_Code>
<Force_G723_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*02723</Force_G723_Code>
<Prefer_G726r16_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0172616</Prefer_G726r16_Code>
<Force_G726r16_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0272616</Force_G726r16_Code>
<Prefer_G726r24_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0172624</Prefer_G726r24_Code>
<Force_G726r24_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0272624</Force_G726r24_Code>
<Prefer_G726r32_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0172632</Prefer_G726r32_Code>
<Force_G726r32_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0272632</Force_G726r32_Code>
<Prefer_G726r40_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0172640</Prefer_G726r40_Code>
<Force_G726r40_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*0272640</Force_G726r40_Code>
<Prefer_G729a_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*01729</Prefer_G729a_Code>
<Force_G729a_Code group=\"Regional/Outbound_Call_Codec_Selection_Codes\">*02729</Force_G729a_Code>
<Set_Local_Date__mm_dd_ group=\"Regional/Miscellaneous\"/>
<Set_Local_Time__HH_mm_ group=\"Regional/Miscellaneous\"/>
<Time_Zone group=\"Regional/Miscellaneous\">GMT-08:00</Time_Zone>
<Time_Offset__HH_mm_ group=\"Regional/Miscellaneous\"/>
<Daylight_Saving_Time_Rule group=\"Regional/Miscellaneous\"/>
<DTMF_Playback_Level group=\"Regional/Miscellaneous\">-16</DTMF_Playback_Level>
<DTMF_Playback_Length group=\"Regional/Miscellaneous\">.1</DTMF_Playback_Length>
<Inband_DTMF_Boost group=\"Regional/Miscellaneous\">12dB</Inband_DTMF_Boost>
<Dictionary_Server_Script group=\"Regional/Miscellaneous\"/>
<Language_Selection group=\"Regional/Miscellaneous\"/>
<Station_Name group=\"Phone/General\"/>
<Voice_Mail_Number group=\"Phone/General\">6050</Voice_Mail_Number>
<Text_Logo group=\"Phone/General\"/>
<BMP_Picture_Download_URL group=\"Phone/General\"/>
<Select_Logo group=\"Phone/General\">Default</Select_Logo>
<Select_Background_Picture group=\"Phone/General\">Default</Select_Background_Picture>
<Extension_1_ group=\"Phone/Line_Key_1\">1</Extension_1_>
<Short_Name_1_ group=\"Phone/Line_Key_1\">\$USER</Short_Name_1_>
<Share_Call_Appearance_1_ group=\"Phone/Line_Key_1\">private</Share_Call_Appearance_1_>
<Extension_2_ group=\"Phone/Line_Key_2\">1</Extension_2_>
<Short_Name_2_ group=\"Phone/Line_Key_2\">\$USER</Short_Name_2_>
<Share_Call_Appearance_2_ group=\"Phone/Line_Key_2\">private</Share_Call_Appearance_2_>
<Extension_3_ group=\"Phone/Line_Key_3\">1</Extension_3_>
<Short_Name_3_ group=\"Phone/Line_Key_3\">\$USER</Short_Name_3_>
<Share_Call_Appearance_3_ group=\"Phone/Line_Key_3\">private</Share_Call_Appearance_3_>
<Extension_4_ group=\"Phone/Line_Key_4\">1</Extension_4_>
<Short_Name_4_ group=\"Phone/Line_Key_4\">\$USER</Short_Name_4_>
<Share_Call_Appearance_4_ group=\"Phone/Line_Key_4\">private</Share_Call_Appearance_4_>
<Extension_5_ group=\"Phone/Line_Key_5\">1</Extension_5_>
<Short_Name_5_ group=\"Phone/Line_Key_5\">\$USER</Short_Name_5_>
<Share_Call_Appearance_5_ group=\"Phone/Line_Key_5\">private</Share_Call_Appearance_5_>
<Extension_6_ group=\"Phone/Line_Key_6\">1</Extension_6_>
<Short_Name_6_ group=\"Phone/Line_Key_6\">\$USER</Short_Name_6_>
<Share_Call_Appearance_6_ group=\"Phone/Line_Key_6\">private</Share_Call_Appearance_6_>
<SCA_Line_ID_Mapping group=\"Phone/Miscellaneous_Line_Key_Settings\">Vertical First</SCA_Line_ID_Mapping>
<SCA_Barge-In_Enable group=\"Phone/Miscellaneous_Line_Key_Settings\">No</SCA_Barge-In_Enable>
<Idle_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Remote_Undefined_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Local_Seized_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Remote_Seized_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Local_Progressing_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Remote_Progressing_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Local_Ringing_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Remote_Ringing_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Local_Active_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Remote_Active_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Local_Held_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Remote_Held_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Register_Failed_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Disabled_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Registering_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Call_Back_Active_LED group=\"Phone/Line_Key_LED_Pattern\"/>
<Conference_Serv group=\"Phone/Supplementary_Services\">Yes</Conference_Serv>
<Attn_Transfer_Serv group=\"Phone/Supplementary_Services\">Yes</Attn_Transfer_Serv>
<Blind_Transfer_Serv group=\"Phone/Supplementary_Services\">Yes</Blind_Transfer_Serv>
<DND_Serv group=\"Phone/Supplementary_Services\">Yes</DND_Serv>
<Block_ANC_Serv group=\"Phone/Supplementary_Services\">Yes</Block_ANC_Serv>
<Call_Back_Serv group=\"Phone/Supplementary_Services\">Yes</Call_Back_Serv>
<Block_CID_Serv group=\"Phone/Supplementary_Services\">Yes</Block_CID_Serv>
<Secure_Call_Serv group=\"Phone/Supplementary_Services\">Yes</Secure_Call_Serv>
<Cfwd_All_Serv group=\"Phone/Supplementary_Services\">Yes</Cfwd_All_Serv>
<Cfwd_Busy_Serv group=\"Phone/Supplementary_Services\">Yes</Cfwd_Busy_Serv>
<Cfwd_No_Ans_Serv group=\"Phone/Supplementary_Services\">Yes</Cfwd_No_Ans_Serv>
<Paging_Serv group=\"Phone/Supplementary_Services\">Yes</Paging_Serv>
<Call_Park_Serv group=\"Phone/Supplementary_Services\">Yes</Call_Park_Serv>
<Call_Pick_Up_Serv group=\"Phone/Supplementary_Services\">Yes</Call_Pick_Up_Serv>
<ACD_Login_Serv group=\"Phone/Supplementary_Services\">No</ACD_Login_Serv>
<Group_Call_Pick_Up_Serv group=\"Phone/Supplementary_Services\">Yes</Group_Call_Pick_Up_Serv>
<ACD_Ext group=\"Phone/Supplementary_Services\">1</ACD_Ext>
<Service_Annc_Serv group=\"Phone/Supplementary_Services\">No</Service_Annc_Serv>
<Web_Serv group=\"Phone/Supplementary_Services\">Yes</Web_Serv>
<Ring1 group=\"Phone/Ring_Tone\">n=Classic-1;w=3;c=1</Ring1>
<Ring2 group=\"Phone/Ring_Tone\">n=Classic-2;w=3;c=2</Ring2>
<Ring3 group=\"Phone/Ring_Tone\">n=Classic-3;w=3;c=3</Ring3>
<Ring4 group=\"Phone/Ring_Tone\">n=Classic-4;w=3;c=4</Ring4>
<Ring5 group=\"Phone/Ring_Tone\">n=Simple-1;w=2;c=1</Ring5>
<Ring6 group=\"Phone/Ring_Tone\">n=Simple-2;w=2;c=2</Ring6>
<Ring7 group=\"Phone/Ring_Tone\">n=Simple-3;w=2;c=3</Ring7>
<Ring8 group=\"Phone/Ring_Tone\">n=Simple-4;w=2;c=4</Ring8>
<Ring9 group=\"Phone/Ring_Tone\">n=Simple-5;w=2;c=5</Ring9>
<Ring10 group=\"Phone/Ring_Tone\">n=Office;w=4;c=1</Ring10>
<Handset_Input_Gain group=\"Phone/Audio_Input_Gain__dB_\">0</Handset_Input_Gain>
<Headset_Input_Gain group=\"Phone/Audio_Input_Gain__dB_\">0</Headset_Input_Gain>
<Speakerphone_Input_Gain group=\"Phone/Audio_Input_Gain__dB_\">0</Speakerphone_Input_Gain>
<Acoustic_Echo_Canceller_Enable group=\"Phone/Audio_Input_Gain__dB_\">Yes</Acoustic_Echo_Canceller_Enable>
<EM_Enable group=\"Phone/Extension_Mobility\">No</EM_Enable>
<EM_User_Domain group=\"Phone/Extension_Mobility\"/>";
fwrite($fh, $spa_file_header);
fclose($fh);
$result_spa = mysql_query("select id, line, site, extension, mailbox, label, firstname, lastname, email, did, setting, voicepass, modified, phonecfg, directorycfg, voicemailcfg, sipcfg, phone_type, setting_sip, setting_spa, setting_spa from extension WHERE macaddress='$macaddress' and not macaddress='' order by line asc") 
or die(mysql_error()); 
// write file header
while($row_spa = mysql_fetch_array( $result_spa )) {
$spa_file = $gen_path."spa".$macaddress.".cfg";
$fh = fopen($spa_file, 'a')or die("can't open file");
$line=$row_spa["line"];
$site=$row_spa["site"];
$extension=$row_spa["extension"];
$mailbox=$row_spa["mailbox"];
$label=$row_spa["label"];
$agent=$row_spa["agent"];
$firstname=$row_spa["firstname"];
$lastname=$row_spa["lastname"];
$email=$row_spa["email"];
$did=$row_spa["did"];
$setting=$row_spa["setting"];
$voicepass=$row_spa["voicepass"];
$operator=$row_spa["operator"];
$modified=$row_spa["modified"];
$phone_type=$row_spa["phone_type"];
$phonecfg=$row_spa["phonecfg"];
$directorycfg=$row_spa["directorycfg"];
$voicemailcfg=$row_spa["voicemailcfg"];
$sipcfg=$row_spa["sipcfg"];
$phone_type=$row_spa["phone_type"];
$setting_sip=$row_spa["setting_sip"];
$result_setting_sip = mysql_query("select password from setting_sip where setting='$setting_sip'") 
or die(mysql_error()); 
while($row_setting_sip = mysql_fetch_array( $result_setting_sip )) {
$password=$row_setting_sip["password"];
//echo "--".$password."--";
}
$spa_extension="<Line_Enable_".$line."_ group=\"Ext_".$line."/General\">Yes</Line_Enable_".$line."_>
<Share_Ext_".$line."_ group=\"Ext_".$line."/Share_Line_Appearance\">private</Share_Ext_".$line."_>
<Shared_User_ID_".$line."_ group=\"Ext_".$line."/Share_Line_Appearance\"/>
<Subscription_Expires_".$line."_ group=\"Ext_".$line."/Share_Line_Appearance\">3600</Subscription_Expires_".$line."_>
<NAT_Mapping_Enable_".$line."_ group=\"Ext_".$line."/NAT_Settings\">No</NAT_Mapping_Enable_".$line."_>
<NAT_Keep_Alive_Enable_".$line."_ group=\"Ext_".$line."/NAT_Settings\">No</NAT_Keep_Alive_Enable_".$line."_>
<NAT_Keep_Alive_Msg_".$line."_ group=\"Ext_".$line."/NAT_Settings\">\$NOTIFY</NAT_Keep_Alive_Msg_".$line."_>
<NAT_Keep_Alive_Dest_".$line."_ group=\"Ext_".$line."/NAT_Settings\">\$PROXY</NAT_Keep_Alive_Dest_".$line."_>
<SIP_TOS_DiffServ_Value_".$line."_ group=\"Ext_".$line."/Network_Settings\">0x68</SIP_TOS_DiffServ_Value_".$line."_>
<SIP_CoS_Value_".$line."_ group=\"Ext_".$line."/Network_Settings\">3</SIP_CoS_Value_".$line."_>
<RTP_TOS_DiffServ_Value_".$line."_ group=\"Ext_".$line."/Network_Settings\">0xb8</RTP_TOS_DiffServ_Value_".$line."_>
<RTP_CoS_Value_".$line."_ group=\"Ext_".$line."/Network_Settings\">6</RTP_CoS_Value_".$line."_>
<Network_Jitter_Level_".$line."_ group=\"Ext_".$line."/Network_Settings\">high</Network_Jitter_Level_".$line."_>
<Jitter_Buffer_Adjustment_".$line."_ group=\"Ext_".$line."/Network_Settings\">up and down</Jitter_Buffer_Adjustment_".$line."_>
<SIP_Transport_".$line."_ group=\"Ext_".$line."/SIP_Settings\">UDP</SIP_Transport_".$line."_>
<SIP_Port_".$line."_ group=\"Ext_".$line."/SIP_Settings\">5060</SIP_Port_".$line."_>
<SIP_".$line."00REL_Enable_".$line."_ group=\"Ext_".$line."/SIP_Settings\">No</SIP_".$line."00REL_Enable_".$line."_>
<EXT_SIP_Port_".$line."_ group=\"Ext_".$line."/SIP_Settings\"/>
<Auth_Resync-Reboot_".$line."_ group=\"Ext_".$line."/SIP_Settings\">Yes</Auth_Resync-Reboot_".$line."_>
<SIP_Proxy-Require_".$line."_ group=\"Ext_".$line."/SIP_Settings\"/>
<SIP_Remote-Party-ID_".$line."_ group=\"Ext_".$line."/SIP_Settings\">No</SIP_Remote-Party-ID_".$line."_>
<Referor_Bye_Delay_".$line."_ group=\"Ext_".$line."/SIP_Settings\">4</Referor_Bye_Delay_".$line."_>
<Refer-To_Target_Contact_".$line."_ group=\"Ext_".$line."/SIP_Settings\">No</Refer-To_Target_Contact_".$line."_>
<Referee_Bye_Delay_".$line."_ group=\"Ext_".$line."/SIP_Settings\">0</Referee_Bye_Delay_".$line."_>
<SIP_Debug_Option_".$line."_ group=\"Ext_".$line."/SIP_Settings\">none</SIP_Debug_Option_".$line."_>
<Refer_Target_Bye_Delay_".$line."_ group=\"Ext_".$line."/SIP_Settings\">0</Refer_Target_Bye_Delay_".$line."_>
<Sticky_".$line."83_".$line."_ group=\"Ext_".$line."/SIP_Settings\">No</Sticky_".$line."83_".$line."_>
<Auth_INVITE_".$line."_ group=\"Ext_".$line."/SIP_Settings\">No</Auth_INVITE_".$line."_>
<Blind_Attn-Xfer_Enable_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\">No</Blind_Attn-Xfer_Enable_".$line."_>
<MOH_Server_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<Message_Waiting_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\">No</Message_Waiting_".$line."_>
<Auth_Page_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\">No</Auth_Page_".$line."_>
<Default_Ring_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\">1</Default_Ring_".$line."_>
<Auth_Page_Realm_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<Conference_Bridge_URL_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<Auth_Page_Password_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<Mailbox_ID_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\">$mailbox</Mailbox_ID_".$line."_>
<Voice_Mail_Server_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<State_Agent_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<CFWD_Notify_Serv_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\">No</CFWD_Notify_Serv_".$line."_>
<CFWD_Notifier_".$line."_ group=\"Ext_".$line."/Call_Feature_Settings\"/>
<Proxy_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">$server_address</Proxy_".$line."_>
<Use_Outbound_Proxy_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">No</Use_Outbound_Proxy_".$line."_>
<Outbound_Proxy_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\"/>
<Use_OB_Proxy_In_Dialog_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">Yes</Use_OB_Proxy_In_Dialog_".$line."_>
<Register_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">Yes</Register_".$line."_>
<Make_Call_Without_Reg_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">No</Make_Call_Without_Reg_".$line."_>
<Register_Expires_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">3600</Register_Expires_".$line."_>
<Ans_Call_Without_Reg_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">No</Ans_Call_Without_Reg_".$line."_>
<Use_DNS_SRV_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">No</Use_DNS_SRV_".$line."_>
<DNS_SRV_Auto_Prefix_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">No</DNS_SRV_Auto_Prefix_".$line."_>
<Proxy_Fallback_Intvl_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">3600</Proxy_Fallback_Intvl_".$line."_>
<Proxy_Redundancy_Method_".$line."_ group=\"Ext_".$line."/Proxy_and_Registration\">Normal</Proxy_Redundancy_Method_".$line."_>
<Display_Name_".$line."_ group=\"Ext_".$line."/Subscriber_Information\">$label</Display_Name_".$line."_>
<User_ID_".$line."_ group=\"Ext_".$line."/Subscriber_Information\">$extension</User_ID_".$line."_>
<Password_".$line."_ group=\"Ext_".$line."/Subscriber_Information\">$password</Password_".$line."_>
<Use_Auth_ID_".$line."_ group=\"Ext_".$line."/Subscriber_Information\">No</Use_Auth_ID_".$line."_>
<Auth_ID_".$line."_ group=\"Ext_".$line."/Subscriber_Information\"/>
<Mini_Certificate_".$line."_ group=\"Ext_".$line."/Subscriber_Information\"/>
<SRTP_Private_Key_".$line."_ group=\"Ext_".$line."/Subscriber_Information\"/>
<Preferred_Codec_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">G711u</Preferred_Codec_".$line."_>
<Use_Pref_Codec_Only_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">No</Use_Pref_Codec_Only_".$line."_>
<Second_Preferred_Codec_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Unspecified</Second_Preferred_Codec_".$line."_>
<Third_Preferred_Codec_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Unspecified</Third_Preferred_Codec_".$line."_>
<G729a_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</G729a_Enable_".$line."_>
<G723_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</G723_Enable_".$line."_>
<G726-16_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</G726-16_Enable_".$line."_>
<G726-24_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</G726-24_Enable_".$line."_>
<G726-32_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</G726-32_Enable_".$line."_>
<G726-40_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</G726-40_Enable_".$line."_>
<Release_Unused_Codec_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</Release_Unused_Codec_".$line."_>
<DTMF_Process_AVT_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Yes</DTMF_Process_AVT_".$line."_>
<Silence_Supp_Enable_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">No</Silence_Supp_Enable_".$line."_>
<DTMF_Tx_Method_".$line."_ group=\"Ext_".$line."/Audio_Configuration\">Auto</DTMF_Tx_Method_".$line."_>
<Dial_Plan_".$line."_ group=\"Ext_".$line."/Dial_Plan\">(*xx|[3469]11|0|00|[2-9]xxxxxx|1xxx[2-9]xxxxxxS0|xxxxxxxxxxxx.)</Dial_Plan_".$line."_>
<Enable_IP_Dialing_".$line."_ group=\"Ext_".$line."/Dial_Plan\">Yes</Enable_IP_Dialing_".$line."_>";
fwrite($fh, $spa_extension);
fclose($fh);
}
$result_spa_setting = mysql_query("select sidecar1, sidecar2, sidecar3, sidecar4, sidecar5, sidecar6, sidecar7, sidecar8, sidecar9, sidecar10, sidecar11, sidecar12, sidecar13, sidecar14, sidecar15, sidecar16, sidecar17, sidecar18, sidecar19, sidecar20, sidecar21, sidecar22, sidecar23, sidecar24, sidecar25, sidecar26, sidecar27, sidecar28, sidecar29, sidecar30, sidecar31, sidecar32, sidecar33, sidecar34, sidecar35, sidecar36, sidecar37, sidecar38, sidecar39, sidecar40, sidecar41, sidecar42, sidecar43, sidecar44, sidecar45, sidecar46, sidecar47, sidecar48, sidecar49, sidecar50, sidecar51, sidecar52, sidecar53, sidecar54, sidecar55, sidecar56, sidecar57, sidecar58, sidecar59, sidecar60, sidecar61, sidecar62, sidecar63, sidecar64 from setting_spa where setting='$setting_spa'")
or die(mysql_error()); 
// write file header
while($row_spa_setting = mysql_fetch_array( $result_spa_setting)) {
$spa_file = $gen_path."spa".$macaddress.".cfg";
$fh = fopen($spa_file, 'a')or die("can't open file");
$sidecar1=$row_spa_setting["sidecar1"];
$sidecar2=$row_spa_setting["sidecar2"];
$sidecar3=$row_spa_setting["sidecar3"];
$sidecar4=$row_spa_setting["sidecar4"];
$sidecar5=$row_spa_setting["sidecar5"];
$sidecar6=$row_spa_setting["sidecar6"];
$sidecar7=$row_spa_setting["sidecar7"];
$sidecar8=$row_spa_setting["sidecar8"];
$sidecar9=$row_spa_setting["sidecar9"];
$sidecar10=$row_spa_setting["sidecar10"];
$sidecar11=$row_spa_setting["sidecar11"];
$sidecar12=$row_spa_setting["sidecar12"];
$sidecar13=$row_spa_setting["sidecar13"];
$sidecar14=$row_spa_setting["sidecar14"];
$sidecar15=$row_spa_setting["sidecar15"];
$sidecar16=$row_spa_setting["sidecar16"];
$sidecar17=$row_spa_setting["sidecar17"];
$sidecar18=$row_spa_setting["sidecar18"];
$sidecar19=$row_spa_setting["sidecar19"];
$sidecar20=$row_spa_setting["sidecar20"];
$sidecar21=$row_spa_setting["sidecar21"];
$sidecar22=$row_spa_setting["sidecar22"];
$sidecar23=$row_spa_setting["sidecar23"];
$sidecar24=$row_spa_setting["sidecar24"];
$sidecar25=$row_spa_setting["sidecar25"];
$sidecar26=$row_spa_setting["sidecar26"];
$sidecar27=$row_spa_setting["sidecar27"];
$sidecar28=$row_spa_setting["sidecar28"];
$sidecar29=$row_spa_setting["sidecar29"];
$sidecar30=$row_spa_setting["sidecar30"];
$sidecar31=$row_spa_setting["sidecar31"];
$sidecar32=$row_spa_setting["sidecar32"];
$sidecar33=$row_spa_setting["sidecar33"];
$sidecar34=$row_spa_setting["sidecar34"];
$sidecar35=$row_spa_setting["sidecar35"];
$sidecar36=$row_spa_setting["sidecar36"];
$sidecar37=$row_spa_setting["sidecar37"];
$sidecar38=$row_spa_setting["sidecar38"];
$sidecar39=$row_spa_setting["sidecar39"];
$sidecar40=$row_spa_setting["sidecar40"];
$sidecar41=$row_spa_setting["sidecar41"];
$sidecar42=$row_spa_setting["sidecar42"];
$sidecar43=$row_spa_setting["sidecar43"];
$sidecar44=$row_spa_setting["sidecar44"];
$sidecar45=$row_spa_setting["sidecar45"];
$sidecar46=$row_spa_setting["sidecar46"];
$sidecar47=$row_spa_setting["sidecar47"];
$sidecar48=$row_spa_setting["sidecar48"];
$sidecar49=$row_spa_setting["sidecar49"];
$sidecar50=$row_spa_setting["sidecar50"];
$sidecar51=$row_spa_setting["sidecar51"];
$sidecar52=$row_spa_setting["sidecar52"];
$sidecar53=$row_spa_setting["sidecar53"];
$sidecar54=$row_spa_setting["sidecar54"];
$sidecar55=$row_spa_setting["sidecar55"];
$sidecar56=$row_spa_setting["sidecar56"];
$sidecar57=$row_spa_setting["sidecar57"];
$sidecar58=$row_spa_setting["sidecar58"];
$sidecar59=$row_spa_setting["sidecar59"];
$sidecar60=$row_spa_setting["sidecar60"];
$sidecar61=$row_spa_setting["sidecar61"];
$sidecar62=$row_spa_setting["sidecar62"];
$sidecar63=$row_spa_setting["sidecar63"];
$sidecar64=$row_spa_setting["sidecar64"];
$spa_sidecar="<Cfwd_All_Dest group=\"User/Call_Forward\"/>
<Cfwd_Busy_Dest group=\"User/Call_Forward\"/>
<Cfwd_No_Ans_Dest group=\"User/Call_Forward\"/>
<Cfwd_No_Ans_Delay group=\"User/Call_Forward\">20</Cfwd_No_Ans_Delay>
<Speed_Dial_2 group=\"User/Speed_Dial\"/>
<Speed_Dial_3 group=\"User/Speed_Dial\"/>
<Speed_Dial_4 group=\"User/Speed_Dial\"/>
<Speed_Dial_5 group=\"User/Speed_Dial\"/>
<Speed_Dial_6 group=\"User/Speed_Dial\"/>
<Speed_Dial_7 group=\"User/Speed_Dial\"/>
<Speed_Dial_8 group=\"User/Speed_Dial\"/>
<Speed_Dial_9 group=\"User/Speed_Dial\"/>
<CW_Setting group=\"User/Supplementary_Services\">Yes</CW_Setting>
<Block_CID_Setting group=\"User/Supplementary_Services\">No</Block_CID_Setting>
<Block_ANC_Setting group=\"User/Supplementary_Services\">No</Block_ANC_Setting>
<DND_Setting group=\"User/Supplementary_Services\">No</DND_Setting>
<Secure_Call_Setting group=\"User/Supplementary_Services\">No</Secure_Call_Setting>
<Dial_Assistance group=\"User/Supplementary_Services\">No</Dial_Assistance>
<Auto_Answer_Page group=\"User/Supplementary_Services\">Yes</Auto_Answer_Page>
<Preferred_Audio_Device group=\"User/Supplementary_Services\">Speaker</Preferred_Audio_Device>
<Send_Audio_To_Speaker group=\"User/Supplementary_Services\">No</Send_Audio_To_Speaker>
<Time_Format group=\"User/Supplementary_Services\">12hr</Time_Format>
<Date_Format group=\"User/Supplementary_Services\">month/day</Date_Format>
<Miss_Call_Shortcut group=\"User/Supplementary_Services\">Yes</Miss_Call_Shortcut>
<Accept_Media_Loopback_Request group=\"User/Supplementary_Services\">automatic</Accept_Media_Loopback_Request>
<Media_Loopback_Mode group=\"User/Supplementary_Services\">source</Media_Loopback_Mode>
<Media_Loopback_Type group=\"User/Supplementary_Services\">media</Media_Loopback_Type>
<Text_Message group=\"User/Supplementary_Services\">Yes</Text_Message>
<Text_Message_From_3rd_Party group=\"User/Supplementary_Services\">No</Text_Message_From_3rd_Party>
<Alert_Tone_Off group=\"User/Supplementary_Services\">No</Alert_Tone_Off>
<RSS_Feed_URL_1 group=\"User/Web_Information_Service_Settings\">name=Local News;url=http://rss.cnn.com/rss/cnn_us.rss</RSS_Feed_URL_1>
<RSS_Feed_URL_2 group=\"User/Web_Information_Service_Settings\">name=World News; url=http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/world/rss.xml</RSS_Feed_URL_2>
<RSS_Feed_URL_3 group=\"User/Web_Information_Service_Settings\">name=Finance News;url=http://finance.yahoo.com/rss/topstories</RSS_Feed_URL_3>
<RSS_Feed_URL_4 group=\"User/Web_Information_Service_Settings\">name=Sports News;url=http://rss.news.yahoo.com/rss/sports</RSS_Feed_URL_4>
<RSS_Feed_URL_5 group=\"User/Web_Information_Service_Settings\">name=Politics News;url=http://rss.news.yahoo.com/rss/politics</RSS_Feed_URL_5>
<Feed_Data_Update_Interval_m_ group=\"User/Web_Information_Service_Settings\">15</Feed_Data_Update_Interval_m_>
<Scrolling_Timer_s_ group=\"User/Web_Information_Service_Settings\">0.8</Scrolling_Timer_s_>
<State group=\"User/Traffic_Service_Information_Settings\">CA</State>
<City group=\"User/Traffic_Service_Information_Settings\">san jose</City>
<Street group=\"User/Traffic_Service_Information_Settings\">cisco</Street>
<Zip_Code group=\"User/Traffic_Service_Information_Settings\">95134</Zip_Code>
<Ringer_Volume group=\"User/Audio_Volume\">8</Ringer_Volume>
<Speaker_Volume group=\"User/Audio_Volume\">8</Speaker_Volume>
<Handset_Volume group=\"User/Audio_Volume\">10</Handset_Volume>
<Headset_Volume group=\"User/Audio_Volume\">10</Headset_Volume>
<LCD_Contrast group=\"User/Audio_Volume\">8</LCD_Contrast>
<Color_Scheme group=\"User/Phone_GUI_Menu_Color_Settings\">Light Blue</Color_Scheme>
<Subscribe_Expires group=\"SPA932/General\">1800</Subscribe_Expires>
<Subscribe_Retry_Interval group=\"SPA932/General\">30</Subscribe_Retry_Interval>
<Unit_1_Enable group=\"SPA932/General\">Yes</Unit_1_Enable>
<Unit_2_Enable group=\"SPA932/General\">Yes</Unit_2_Enable>
<Test_Mode_Enable group=\"SPA932/General\">No</Test_Mode_Enable>
<Server_Type group=\"SPA932/General\">Asterisk</Server_Type>
<Unit_1_Key_1 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar1@$server_address</Unit_1_Key_1>
<Unit_1_Key_2 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar2@$server_address</Unit_1_Key_2>
<Unit_1_Key_3 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar3@$server_address</Unit_1_Key_3>
<Unit_1_Key_4 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar4@$server_address</Unit_1_Key_4>
<Unit_1_Key_5 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar5@$server_address</Unit_1_Key_5>
<Unit_1_Key_6 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar6@$server_address</Unit_1_Key_6>
<Unit_1_Key_7 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar7@$server_address</Unit_1_Key_7>
<Unit_1_Key_8 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar8@$server_address</Unit_1_Key_8>
<Unit_1_Key_9 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar9@$server_address</Unit_1_Key_9>
<Unit_1_Key_10 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar10@$server_address</Unit_1_Key_10>
<Unit_1_Key_11 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar11@$server_address</Unit_1_Key_11>
<Unit_1_Key_12 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar12@$server_address</Unit_1_Key_12>
<Unit_1_Key_13 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar13@$server_address</Unit_1_Key_13>
<Unit_1_Key_14 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar14@$server_address</Unit_1_Key_14>
<Unit_1_Key_15 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar15@$server_address</Unit_1_Key_15>
<Unit_1_Key_16 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar16@$server_address</Unit_1_Key_16>
<Unit_1_Key_17 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar17@$server_address</Unit_1_Key_17>
<Unit_1_Key_18 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar18@$server_address</Unit_1_Key_18>
<Unit_1_Key_19 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar19@$server_address</Unit_1_Key_19>
<Unit_1_Key_20 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar20@$server_address</Unit_1_Key_20>
<Unit_1_Key_21 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar21@$server_address</Unit_1_Key_21>
<Unit_1_Key_22 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar22@$server_address</Unit_1_Key_22>
<Unit_1_Key_23 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar23@$server_address</Unit_1_Key_23>
<Unit_1_Key_24 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar24@$server_address</Unit_1_Key_24>
<Unit_1_Key_25 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar25@$server_address</Unit_1_Key_25>
<Unit_1_Key_26 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar26@$server_address</Unit_1_Key_26>
<Unit_1_Key_27 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar27@$server_address</Unit_1_Key_27>
<Unit_1_Key_28 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar28@$server_address</Unit_1_Key_28>
<Unit_1_Key_29 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar29@$server_address</Unit_1_Key_29>
<Unit_1_Key_30 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar30@$server_address</Unit_1_Key_30>
<Unit_1_Key_31 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar31@$server_address</Unit_1_Key_31>
<Unit_1_Key_32 group=\"SPA932/Unit_1\">fnc=blf+sd;sub=$sidecar32@$server_address</Unit_1_Key_32>
<Unit_2_Key_1 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar33@$server_address</Unit_2_Key_1>
<Unit_2_Key_2 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar34@$server_address</Unit_2_Key_2>
<Unit_2_Key_3 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar35@$server_address</Unit_2_Key_3>
<Unit_2_Key_4 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar36@$server_address</Unit_2_Key_4>
<Unit_2_Key_5 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar37@$server_address</Unit_2_Key_5>
<Unit_2_Key_6 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar38@$server_address</Unit_2_Key_6>
<Unit_2_Key_7 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar39@$server_address</Unit_2_Key_7>
<Unit_2_Key_8 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar40@$server_address</Unit_2_Key_8>
<Unit_2_Key_9 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar41@$server_address</Unit_2_Key_9>
<Unit_2_Key_10 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar42@$server_address</Unit_2_Key_10>
<Unit_2_Key_11 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar43@$server_address</Unit_2_Key_11>
<Unit_2_Key_12 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar44@$server_address</Unit_2_Key_12>
<Unit_2_Key_13 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar45@$server_address</Unit_2_Key_13>
<Unit_2_Key_14 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar46@$server_address</Unit_2_Key_14>
<Unit_2_Key_15 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar47@$server_address</Unit_2_Key_15>
<Unit_2_Key_16 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar48@$server_address</Unit_2_Key_16>
<Unit_2_Key_17 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar49@$server_address</Unit_2_Key_17>
<Unit_2_Key_18 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar50@$server_address</Unit_2_Key_18>
<Unit_2_Key_19 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar51@$server_address</Unit_2_Key_19>
<Unit_2_Key_20 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar52@$server_address</Unit_2_Key_20>
<Unit_2_Key_21 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar53@$server_address</Unit_2_Key_21>
<Unit_2_Key_22 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar54@$server_address</Unit_2_Key_22>
<Unit_2_Key_23 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar55@$server_address</Unit_2_Key_23>
<Unit_2_Key_24 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar56@$server_address</Unit_2_Key_24>
<Unit_2_Key_25 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar57@$server_address</Unit_2_Key_25>
<Unit_2_Key_26 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar58@$server_address</Unit_2_Key_26>
<Unit_2_Key_27 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar59@$server_address</Unit_2_Key_27>
<Unit_2_Key_28 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar60@$server_address</Unit_2_Key_28>
<Unit_2_Key_29 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar61@$server_address</Unit_2_Key_29>
<Unit_2_Key_30 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar62@$server_address</Unit_2_Key_30>
<Unit_2_Key_31 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar63@$server_address</Unit_2_Key_31>
<Unit_2_Key_32 group=\"SPA932/Unit_2\">fnc=blf+sd;sub=$sidecar64@$server_address</Unit_2_Key_32>
</flat-profile>";
fwrite($fh, $spa_sidecar);
fclose($fh);
}
}
echo "<br />";
?>
