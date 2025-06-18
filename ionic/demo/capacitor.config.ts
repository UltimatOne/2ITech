import type { CapacitorConfig } from '@capacitor/cli'

const config: CapacitorConfig = {
  appId: 'io.ionic.starter',
  appName: 'demo',
  webDir: 'dist',
  server: {
    cleartext: true, // j'autorise le HTTP
    hostname: 'localhost',
    androidScheme: 'http'
  },
  plugins: {
    PushNotifications: {
      presentationOptions: ["badge", "sound", "alert"],
    },
  }
}

export default config
