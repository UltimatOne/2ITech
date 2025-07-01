import type { CapacitorConfig } from '@capacitor/cli'

const config: CapacitorConfig = {
  appId: 'io.ionic.starter',
  appName: 'demo',
  webDir: 'dist',
  server: {
    cleartext: true, // j'autorise le HTTP
    hostname: '192.168.1.69',
    androidScheme: 'http'
  },
  plugins: {
    PushNotifications: {
      presentationOptions: ["badge", "sound", "alert"],
    },
  }
}

export default config
