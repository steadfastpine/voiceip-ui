<br /><br />
<table class="extensions" border="0" cellspacing="0">
<tr><td>
allowsubscribe </td><td> yes|no </td><td> Allow or Ignore Subscribe requests</td></tr>
<tr><td>
allow </td><td> <codec> </td><td> Allow codecs in order of preference (Use DISALLOW ALL first, before allowing other codecs)</td></tr>
<tr><td>
disallow </td><td> all </td><td> Disallow all codecs (global configuration)</td></tr>
<tr><td>
Asterisk sip allowexternaldomains </td><td> yes|no </td><td> Enable/Disable INVITE and REFER to non-local domains. Default yes. (New in v1.2.x).</td></tr>
<tr><td>
allowguest </td><td> yes|no </td><td> Allow or reject guest calls. Default is yes. (this can also be set to 'osp' if asterisk was compiled with OSP support). (New in v1.2.x).</td></tr>
<tr><td>
Asterisk sip allowoverlap </td><td> yes|no </td><td> Enable/disable overlap dialing support. Default yes.</td></tr>
<tr><td>
Autocreatepeer </td><td> yes|no </td><td> If set, anyone will be able to log in as a peer (with no check of credentials; useful for operation with SER). Default no.</td></tr>
<tr><td>
Asterisk sip autodomain </td><td> yes|no </td><td> Enable/disable Asterisk's ability to add local hostnames and local IP address to the domain list. externip or externhost are also taken into the domain list. Default no. (New in v1.2.x).</td></tr>
<tr><td>
bindaddr </td><td> IP_Address </td><td> IP Address to bind to (listen on). Default 0.0.0.0 (all network interfaces).</td></tr>
<tr><td>
bindport </td><td> Number </td><td> UDP Port to bind to (listen on). Used to be port in Asterisk v1.0.x. Default 5060.</td></tr>
<tr><td>
callerid </td><td> <string> </td><td> Caller ID information used when nothing else is available. Defaults to asterisk. (The ability to override the default appears to available in Asterisk 1.0.9. Unsure about other versions.)</td></tr>
<tr><td>
canreinvite </td><td> update|yes|no|nonat (global setting)</td><td> For some reason this defaults to yes, so beware...</td></tr>
<tr><td>
Asterisk sip checkmwi </td><td> Number </td><td> Global interval (in seconds) between mailbox checks. Default 10 seconds. (New in v1.2.x)</td></tr>
<tr><td>
Asterisk sip compactheaders </td><td> yes|no </td><td> Indicates Asterisk should send compact (i.e. abbreviated) headers in the SIP messages. Default no. (New in v1.2.x)</td></tr>
<tr><td>
context </td><td> <contextname> </td><td> This is the default context and is used when a endpoint has no context property. The context in section of an endpoint is used to route calls from that endpoint to the wanted destination. The context body is located in extensions.conf.</td></tr>
<tr><td>
defaultexpiry</td><td> Number </td><td> Default duration (in seconds) of incoming/outgoing registration. Default 120 seconds.</td></tr>
<tr><td>
domain </td><td> domains </td><td> Comma separated list of domains which Asterisk is responsible for. (New in Asterisk 1.2.x)</td></tr>
<tr><td>
dtmfmode </td><td> inband|info|rfc2833 (global setting). Default rfc2833. Warning</td><td> inband very high CPU load.</td></tr>
<tr><td>
dumphistory </td><td> yes|no </td><td> Enable support for dumping of SIP conversation's transaction history to LOG_DEBUG. Default no. (New in v1.2.x)</td></tr>
<tr><td>
externip </td><td> IP_Address or a hostname </td><td> Address that we're going to put in SIP messages if we're behind a NAT. If a hostname is used as the value, then the IP address associated with the hostname is looked up only once during the reading of the sip.conf. If you want support for a hostname associated with a dynamic IP address, use Asterisk sip externhost.</td></tr>
<tr><td>
externhost </td><td> hostname.tld </td><td> (New in Asterisk 1.2.x)</td></tr>
<tr><td>
externrefresh </td><td> Number </td><td> Specify how often (in seconds) a hostname DNS lookup should be performed for the value entered in 'externhost'. Default 10 seconds. (New in Asterisk 1.2.x).</td></tr>
<tr><td>
ignoreregexpire </td><td> yes|no </td><td> Indicates whether to use Contact information about a peer even if the information is stale because it has reached its expiration time. Default no. (New in v1.2.x)</td></tr>
<tr><td>
jbenable </td><td> yes|no </td><td> Enables the use of a jitterbuffer on the receiving side of a SIP channel. (Added in Version 1.4)</td></tr>
<tr><td>
jbforce </td><td> yes|no </td><td> Forces the use of a jitterbuffer on the receive side of a SIP channel. Defaults to "no". (Added in Version 1.4)</td></tr>
<tr><td>
jbmaxsize </td><td> Number </td><td> Max length of the jitterbuffer in milliseconds. (Added in Version 1.4)</td></tr>
<tr><td>
jbresyncthreshold </td><td> Number </td><td> Jump in the frame timestamps over which the jitterbuffer is resynchronized. Useful to improve the quality of the voice, with big jumps in/broken timestamps, usually sent from exotic devices and programs. Defaults to 1000. (Added in Version 1.4)</td></tr>
<tr><td>
jbimpl </td><td> fixed|adaptive</td><td> Jitterbuffer implementation, used on the receiving side of a SIP channel. Two implementations are currently available - "fixed" (with size always equals to jbmaxsize) and "adaptive" (with variable size, actually the new jb of IAX2). Defaults to fixed. (Added in Version 1.4)</td></tr>
<tr><td>
jblog </td><td> no|yes</td><td> Enables jitterbuffer frame logging. Defaults to "no". (Added in Version 1.4)</td></tr>
<tr><td>
language </td><td> <string> </td><td> Default language used by any Playback()/Background().</td></tr>
<tr><td>
limitonpeers </td><td> yes|no</td><td> If set to yes use only the peer call counter for both incoming and outgoing calls (ref. hints, subscriptions, BLF; added in 1.4)</td></tr>
<tr><td>
localnet </td><td> NetAddress/Netmask </td><td> local network and mask.</td></tr>
<tr><td>
fromdomain</td><td> <domain> </td><td> Sets default From domain in SIP messages when acting as a SIP ua (client)</td></tr>
<tr><td>
insecure </td><td> very|yes|no|invite|port </td><td> Specifies how to handle connections with peers. Default no (authenticate all connections). (invite and port added in v1.2.x).</td></tr>
<tr><td>
maxexpirey </td><td> Number </td><td> Max duration (in seconds) of incoming registration we allow. Default 3600 seconds.</td></tr>
<tr><td>
musicclass </td><td> one of the classes specified in musiconhold.conf</td></tr>
<tr><td>
musdiconhold </td><td> same as musicclass</td></tr>
<tr><td>
nat </td><td> yes|no </td><td> Please note that as of Asterisk 1.0.x nat can now have the values yes|no|never|route. Default no which really means to use rfc3581 techniques.</td></tr>
<tr><td>
notifymimetype </td><td> mediatype/subtype </td><td> Allow overriding of mime type in MWI NOTIFY used in voicemail online messages. Valid MIME types can be found here. Default application/simple-message-summary. (New in v1.2.x).</td></tr>
<tr><td>
notifyringing </td><td> yes|no </td><td> Notify subscription on RINGING state. Default yes. (New in v1.2.x).</td></tr>
<tr><td>
outboundproxy </td><td> IP_address or DNS SRV name (excluding the _sip._udp prefix) </td><td> SRV name, hostname, or IP address of the outbound SIP Proxy. (New in v1.2.x).</td></tr>
<tr><td>
outboundproxyport </td><td> Number </td><td> UDP port number for the Outbound SIP Proxy. (New in v1.2.x).</td></tr>
<tr><td>
pedantic </td><td> yes|no </td><td> Enable slow, pedantic checking of Call-IDs, multiline SIP headers and URI-encoded headers. Default no.</td></tr>
<tr><td>
port </td><td> <portno> </td><td> Default SIP port of peer. (this is not the port for Asterisk to listen. See bindport).</td></tr>
<tr><td>
progressinband </td><td> never|no|yes </td><td> If we should generate in-band ringing always. Default never.</td></tr>
<tr><td>
promiscredir</td><td> yes|no </td><td> Allows support for 302 Redirects; (Note will redirect them all to the local extension returned in Contact rather than to that extension at the destination). Default no.</td></tr>
<tr><td>
qualify </td><td> yes|no|milliseconds </td><td> Check if client is reachable. If yes, the checks occur every 60 seconds. Default no.</td></tr>
<tr><td>
realm </td><td> my realm (Change authentication realm from asterisk (default) to your own. Requires Asterisk v1.x)</td></tr>
<tr><td>
recordhistory </td><td> yes|no. Enable logging of SIP conversation's transaction history. Default no. (New in v1.2.x).</td></tr>
<tr><td>
regcontext </td><td> context </td><td> Default context to use for SIP REGISTER replies from the SIP Registrar.</td></tr>
<tr><td>
register </td><td>> <username></td><td><password></td><td>[authid]@<sip client/peer id in sip.conf>/<contact> </td><td>Register with a SIP provider</td></tr>
<tr><td>
registerattempts </td><td> Number </td><td> Number of SIP REGISTER messages to send to a SIP Registrar before giving up. Default 0 (no limit). (New in v1.2.x).</td></tr>
<tr><td>
registertimeout </td><td> Number </td><td> Number of seconds to wait for a response from a SIP Registrar before classifying the SIP REGISTER has timed out. Default 20 seconds. (New in v1.2.x).</td></tr>
<tr><td>
relaxdtmf </td><td> yes|no</td><td> Default no.</td></tr>
<tr><td>
rtautoclear </td><td> yes|no|number </td><td> Auto-Expire friends created on the fly. If yes the autoexpire will be in 120 seconds. Default yes. (New in v1.2.x). Buggy up to 1.4.19, see bug 12707</td></tr>
<tr><td>
rtcachefriends </td><td> yes|no </td><td> Cache realtime friends by adding them to the internal list just like friends added from the config file. Default no. (New in v1.2.x). Buggy up to 1.4.19, see bug 12707</td></tr>
<tr><td>
rtsavesysname </td><td> yes|no </td><td> If set will write the value of asterisk.conf (options) systemname to the sip peer table in the field "regserver". Useful for multi-server systems. (New in v1.?)</td></tr>
<tr><td>
rtpholdtimeout </td><td> Number </td><td> Max number of seconds of inactivity before terminating a call on hold. Default 0 (no limit). (New in v1.2.x).</td></tr>
<tr><td>
rtpkeepalive </td><td> Number </td><td> Number of seconds, when a RTP Keepalive packet will be sent if no other RTP traffic on that connection. Default 0 (no RTP Keepalive). (New in v1.2.x).</td></tr>
<tr><td>
rtptimeout </td><td> Number </td><td> Number of seconds, to wait for RTP traffic before classify the connection as discontinued. Default 0 (no RTP timeout). (New in v1.2.x).</td></tr>
<tr><td>
rtupdate </td><td> yes|no </td><td> Send registry updates to the database when using Realtime support. Default yes. (New in v1.2.x).</td></tr>
<tr><td>
sendrpid </td><td> yes|no </td><td> If a Remote-Party-ID SIP header should be sent. Default no.</td></tr>
<tr><td>
sipdebug </td><td> yes|no. Default setting for whether SIP debug is enabled upon loading of the sip.conf. Default no. (New in v1.2.x).</td></tr>
<tr><td>
srvlookup </td><td> yes|no </td><td> Enable DNS SRV lookups on calls. Default yes. (Default is no prior to v1.4.14)</td></tr>
<tr><td>
tos </td><td> <value> </td><td> Set IP QoS parameters for outgoing media streams (numeric values are also accepted, like tos</td><td>184 )</td></tr>
<tr><td>
trustrpid </td><td> yes|no </td><td> If Remote-Party-ID SIP header should be trusted. Default no.</td></tr>
<tr><td>
useclientcode </td><td> yes|no </td><td> If yes, then the Call Originator as stated in the CDR will be changed to whatever is specified in a X-ClientCode SIP Header. Default no. (New in v1.2.x)</td></tr>
<tr><td>
usereqphone </td><td> yes|no </td><td> Indicates whether to add a ";user</td><td>phone" to the URI. Default no. (New in v1.2.x)</td></tr>
<tr><td>
useragent </td><td> <string> </td><td> Allow the SIP header "User-Agent" to be customized. Default asterisk.</td></tr>
<tr><td>
videosupport </td><td> yes|no </td><td> Turn on support for SIP video (peer specific setting added in SVN Dec 21 2005, bug 5427. Default no.</td></tr>
<tr><td>
vmexten </td><td> <string> </td><td> Dialplan extension to reach mailbox. Default asterisk. (New in v1.2.x)</td></tr>
<tr><td>
callevents </td><td> yes|no</td><td> Set to yes to receive events on AMI when a call is put on/off hold. 
SIP configurations - peers and clients
These variables can be configured for each SIP peer definition</td><td>
(If not specified, the configuration variable can be used for both type</td><td>peer and type</td><td>user.)
</td></tr>
<tr><td>
accountcode </td><td> <string> </td><td> Users may be associated with an accountcode. See Asterisk billing</td></tr>
<tr><td>
allow </td><td> <codec> </td><td> Allow codecs in order of preference (Use DISALLOW</td><td>ALL first, before allowing other codecs)</td></tr>
<tr><td>
disallow </td><td> all </td><td> Disallow all codecs for this peer or user definition.</td></tr>
<tr><td>
allowguest </td><td> yes|no </td><td> Allow or reject guest calls (default is yes, this can also be set to 'osp' if asterisk was compiled with OSP support). (New in v1.2.x).</td></tr>
<tr><td>
amaflags </td><td> Categorization for CDR records. Choices are default, omit, billing, documentation. See Asterisk billing</td></tr>
<tr><td>
astdb </td><td> Appears to insert a value in the Asterisk database. See example below.</td></tr>
<tr><td>
auth </td><td> <authname> </td><td> Value assigned to the Digest username</td><td> SIP header.</td></tr>
<tr><td>
callerid </td><td> <string> </td><td> Caller ID information used when nothing else is available. Defaults to asterisk.</td></tr>
<tr><td>
busylevel </td><td> number </td><td> Number of simultaneous calls until user/peer is busy</td></tr>
<tr><td>
call-limit </td><td> number </td><td> Number of simultaneous calls through this user/peer.</td></tr>
<tr><td>
callgroup </td><td> num1,num2-num3 </td><td> Defines call groups for calls to this device.</td></tr>
<tr><td>
callingpres </td><td> number|descriptive_text </td><td> Set Caller-ID presentation on a call. Valid descriptive values are</td><td> allowed_not_screened, allowed_passed_screen, allowed_failed_screen, allowed, prohib_not_screened, prohib_passed_screen, prohib_failed_screen, prohib, and unavailable. See SetCallerPres for more information. Default allowed_not_screened.</td></tr>
<tr><td>
canreinvite </td><td> update|yes|no|nonat </td><td> If the client is able to support SIP re-invites. Default yes.</td></tr>
<tr><td>
cid_number </td><td> <string> </td><td> Sets the outbound $CALLERID(num) to <string>. (New in v.1.4.x)</td></tr>
<tr><td>
context </td><td> <context_name> </td><td> If type</td><td>user, the Context for the inbound call from this SIP user definition. If type</td><td>peer, the Context in the dialplan for outbound calls from this SIP peer definition. If type</td><td>friend the context used for both inbound and outbound calls through the SIP entities definition. If no type</td><td>user entry matches an inbound call, then a type</td><td>peer or type</td><td>friend will match if the hostname or IP address defined in host</td><td> matches.</td></tr>
<tr><td>
defaultip </td><td> Dotted.Quad.IP.Addr </td><td> Default IP address of client if host</td><td>dynamic is specified. Used if client has not registered at any other IP address. Valid only for type</td><td>peer.</td></tr>
<tr><td>
directrtpsetup </td><td> yes|no</td><td> Similar to canreinvite, but right away passes media to the other party like a SIP proxy</td></tr>
<tr><td>
dtmfmode </td><td> inband|info|rfc2833 </td><td> How the client handles DTMF signalling. Default rfc2833. Warning</td><td> inband very high CPU load.</td></tr>
<tr><td>
fromuser </td><td> <from_ID> </td><td> Specify user to put in "from" instead of $CALLERID(number) (overrides the callerid) when placing calls _to_ peer (another SIP proxy). Valid only for type</td><td>peer.</td></tr>
<tr><td>
fromdomain </td><td> <domain> </td><td> Sets default From</td><td> domain in SIP messages when placing calls _to_ peer. Valid only when in [general] section or type</td><td>peer.</td></tr>
<tr><td>
fullcontact </td><td> <sip</td><td>uri_contact> </td><td> SIP URI contact for realtime peer. Valid only for realtime peers.</td></tr>
<tr><td>
fullname </td><td> "Full Name" </td><td> Sets outbound $CALLERID(name). (New in v1.4.x)</td></tr>
<tr><td>
host </td><td> dynamic|hostname|IPAddr </td><td> How to find the client - IP # or host name. If you want the phone to register itself, use the keyword dynamic instead of Host IP.</td></tr>
<tr><td>
incominglimit and outgoinglimit </td><td> Number </td><td> Limits for number of simultaneous active calls for a SIP client. Valid only for type</td><td>peer.</td></tr>
<tr><td>
insecure </td><td> very|yes|no|invite|port </td><td> Specifies how to handle connections with peers. Default no (authenticate all connections). (invite and port added in v1.2.x).</td></tr>
<tr><td>
ipaddr </td><td> Dotted Quad IP address of the peer. Valid only for realtime peers.</td></tr>
<tr><td>
language </td><td> A language code defined in indications.conf - defines language for prompts</td></tr>
<tr><td>
mailbox </td><td> mailbox </td><td> Voicemail extension (for message waiting indications). Valid only for type</td><td>peer. Edit</td><td> also valid for type</td><td>friend (verified with 1.4.22.1).</td></tr>
<tr><td>
md5secret </td><td> MD5-Hash of "<user></td><td></td><td></td><td>SIP_realm</td><td></td><td></td><td><secret>" (can be used instead of secret). Default for authenticating to an Asterisk server when SIP realm is not explicitly declared is "<user></td><td>asterisk</td><td><secret>".</td></tr>
<tr><td>
musicclass </td><td> one of the classes specified in musiconhold.conf</td></tr>
<tr><td>
musiconhold </td><td> Set class of musiconhold on calls from SIP phone. Calls to the phone require SetMusicOnHold cmd of higher priority (lower numerical value of priority) than Dial cmd in dialplan in order to set this class for the call. Calls have the MusicOnHold class set on a per call basis, not on a per phone basis, and making a call through any extension specifying SetMusicOnHold will override this value for the call.</td></tr>
<tr><td>
subscribemwi</td><td> Instructs Asterisk to not send NOTIFY messages for message waiting indication (added in v1.4)</td></tr>
<tr><td>
name </td><td> <name> </td><td> Name of the realtime peer. If the peer is an actual phone then this will generally be the extension number of that phone. On some softphones this field corresponds to the "username" field/option in the softphone's settings. Valid only for realtime peers.</td></tr>
<tr><td>
nat </td><td> yes|no </td><td> This variable changes the behaviour of Asterisk for clients behind a firewall. This does not solve the problem if Asterisk is behind the firewall and the client on the outside. Please note that as of Asterisk 1.0.x nat can now have the values</td><td> yes|no|never|route. Default no which really means to use rfc3581 techniques.</td></tr>
<tr><td>
outboundproxy </td><td> IP_address or DNS SRV name (excluding the _sip._udp prefix) </td><td> SRV name, hostname, or IP address of the outbound SIP Proxy. Valid only in [general] section and type</td><td>peer. (New in v1.2.x).</td></tr>
<tr><td>
permit, deny,mask </td><td> IP address and network restriction</td></tr>
<tr><td>
pickupgroup </td><td> Group that can pickup fellow workers' calls using *8 and the Pickup() application on the *8 extension</td></tr>
<tr><td>
port </td><td> SIP port of the client</td></tr>
<tr><td>
progressinband </td><td> never|no|yes </td><td> If we should generate in-band ringing always. Default never.</td></tr>
<tr><td>
promiscredir </td><td> yes|no </td><td> Allows support for 302 Redirects; (Note</td><td> will redirect them all to the local extension returned in Contact rather than to that extension at the destination). Default no.</td></tr>
<tr><td>
qualify </td><td> yes|no|milliseconds </td><td> Check if client is reachable. If yes, the checks occur every 60 seconds. Valid only in [general] section and type</td><td>peer.</td></tr>
<tr><td>
regexten </td><td></td></tr>
<tr><td>
regseconds </td><td> seconds </td><td> Number of seconds between SIP REGISTER. Valid only for realtime peer entries.</td></tr>
<tr><td>
restrictcid </td><td> (yes/no) To have the callerid restricted -> sent as ANI; use this to hide the caller ID. This does not seem to work. This variable has been deprecated as of v1.2.x.</td></tr>
<tr><td>
rtpkeepalive </td><td> seconds </td><td> Number of seconds, when a RTP Keepalive packet will be sent if no other RTP traffic on that connection. Default 0 (no RTP Keepalive). Valid only in [general] section and type</td><td>peer.</td></tr>
<tr><td>
rtptimeout </td><td> seconds </td><td> Terminate call if x seconds of no RTP activity when we're not on hold. Valid only in [general] section and type</td><td>peer.</td></tr>
<tr><td>
rtpholdtimeout </td><td> seconds </td><td> Terminate call if x seconds of no RTP activity when we're on hold (must be larger than rtptimeout). Valid only in [general] section and type</td><td>peer.</td></tr>
<tr><td>
secret </td><td> If Asterisk is acting as a SIP Server, then this SIP client must login with this Password (A shared secret). If Asterisk is acting as a SIP client to a remote SIP server that requires SIP INVITE authentication, then this field is used to authenticate SIP INVITEs that Asterisk sends to the remote SIP server. Asterisk 1.6.2.x</td><td> Changed the secret parameter to remotesecret.</td></tr>
<tr><td>
sendrpid </td><td> yes|no </td><td> If a Remote-Party-ID SIP header should be sent. Default no.</td></tr>
<tr><td>
setvar </td><td> variable</td><td>value </td><td> Channel variable to be set for all calls from this peer/user.</td></tr>
<tr><td>
subscribecontext </td><td> <context_name> </td><td> Set a specific context for SIP SUBSCRIBE requests</td></tr>
<tr><td>
trunkname</td><td> Indicates this peer definition is for a SIP trunk. As a result, the $CALLERID(name) will start off blank and requires the dialplan to set the $CALLERID(name). (New in v1.6.x)</td></tr>
<tr><td>
trustrpid </td><td> yes|no </td><td> If Remote-Party-ID SIP header should be trusted. Default no.</td></tr>
<tr><td>
type </td><td> user|peer|friend </td><td> Relationship to client - outbound provider or full client?</td></tr>
<tr><td>
useclientcode </td><td> yes|no </td><td> If yes, then the Call Originator as stated in the CDR will be changed to whatever is specified in a X-ClientCode SIP Header. Default no. (New in v1.2.x)</td></tr>
<tr><td>
usereqphone </td><td> yes|no </td><td> Indicates whether to add a ";user</td><td>phone" to the URI. Default no. Valid only in [general] and type</td><td>peer.</td></tr>
<tr><td>
username </td><td> <username[@realm]> </td><td> If Asterisk is accepting SIP INVITE requests from a remote SIP client, this field specifies the user name for authentication. (Contrast with fromuser.) Also, for peers that register with Asterisk, this username is used in INVITEs until we have a registration.</td></tr>
<tr><td>
vmexten </td><td> <string> </td><td> Dialplan extension to reach mailbox. Default asterisk. Valid only in [general] or type</td><td>peer. 
</td></tr>
</table>
</div>
